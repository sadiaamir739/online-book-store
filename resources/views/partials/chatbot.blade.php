<style>
    .book-chatbot {
        --chat-ink: #17243d;
        --chat-gold: #d4a84f;
        --chat-paper: #fffdf8;
        font-family: inherit;
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 1200;
    }

    .book-chatbot__toggle {
        width: 58px;
        height: 58px;
        border: 0;
        border-radius: 50%;
        background: var(--chat-ink);
        color: var(--chat-paper);
        box-shadow: 0 12px 30px rgba(23, 36, 61, .28);
        cursor: pointer;
        display: grid;
        place-items: center;
        transition: transform .2s ease, background .2s ease;
    }

    .book-chatbot__toggle:hover { transform: translateY(-3px); background: #253b62; }
    .book-chatbot__toggle i { font-size: 25px; }
    .book-chatbot__panel {
        position: absolute;
        right: 0;
        bottom: 72px;
        width: min(360px, calc(100vw - 32px));
        height: min(560px, calc(100vh - 120px));
        min-height: 390px;
        overflow: hidden;
        display: none;
        flex-direction: column;
        background: var(--chat-paper);
        border: 1px solid rgba(23, 36, 61, .1);
        border-radius: 18px;
        box-shadow: 0 22px 60px rgba(23, 36, 61, .25);
    }

    .book-chatbot.is-open .book-chatbot__panel { display: flex; animation: chatbot-rise .22s ease-out; }
    .book-chatbot.is-open .book-chatbot__toggle { background: var(--chat-gold); color: var(--chat-ink); }
    .book-chatbot__header { padding: 18px 18px 16px; background: var(--chat-ink); color: white; display: flex; align-items: center; justify-content: space-between; }
    .book-chatbot__identity { display: flex; align-items: center; gap: 11px; }
    .book-chatbot__avatar { width: 38px; height: 38px; border-radius: 12px; background: var(--chat-gold); color: var(--chat-ink); display: grid; place-items: center; font-size: 19px; }
    .book-chatbot__title { margin: 0; font-size: 15px; font-weight: 800; }
    .book-chatbot__status { margin: 2px 0 0; color: #d7e3f3; font-size: 11px; }
    .book-chatbot__close { border: 0; background: transparent; color: white; cursor: pointer; font-size: 19px; padding: 4px; }
    .book-chatbot__messages { flex: 1; overflow-y: auto; padding: 17px 14px; display: flex; flex-direction: column; gap: 10px; background: #f7f4ed; }
    .book-chatbot__message { max-width: 86%; padding: 10px 12px; border-radius: 13px; color: #273247; font-size: 13px; line-height: 1.45; white-space: pre-wrap; overflow-wrap: anywhere; }
    .book-chatbot__message--bot { align-self: flex-start; background: white; border: 1px solid #e7e1d5; border-bottom-left-radius: 4px; }
    .book-chatbot__message--user { align-self: flex-end; background: var(--chat-ink); color: white; border-bottom-right-radius: 4px; }
    .book-chatbot__message--error { background: #fff0ed; color: #9e372c; border-color: #f5c2b9; }
    .book-chatbot__form { display: flex; gap: 8px; padding: 11px; background: white; border-top: 1px solid #ebe7de; }
    .book-chatbot__input { flex: 1; min-width: 0; resize: none; border: 1px solid #d9d6cf; border-radius: 10px; padding: 10px 11px; font: inherit; font-size: 13px; outline: none; }
    .book-chatbot__input:focus { border-color: var(--chat-gold); box-shadow: 0 0 0 3px rgba(212, 168, 79, .18); }
    .book-chatbot__send { width: 40px; border: 0; border-radius: 10px; background: var(--chat-gold); color: var(--chat-ink); cursor: pointer; font-size: 17px; }
    .book-chatbot__send:disabled { opacity: .55; cursor: wait; }
    .book-chatbot__typing { display: none; align-self: flex-start; color: #657086; font-size: 12px; padding: 0 4px; }
    .book-chatbot.is-loading .book-chatbot__typing { display: block; }
    @keyframes chatbot-rise { from { opacity: 0; transform: translateY(10px) scale(.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
    @media (max-width: 520px) { .book-chatbot { right: 16px; bottom: 16px; } .book-chatbot__panel { bottom: 70px; } }
</style>

<div class="book-chatbot" data-chatbot>
    <section class="book-chatbot__panel" aria-label="Book Store Assistant" aria-hidden="true">
        <header class="book-chatbot__header">
            <div class="book-chatbot__identity">
                <div class="book-chatbot__avatar"><i class="bi bi-stars"></i></div>
                <div><p class="book-chatbot__title">Book Store Assistant</p><p class="book-chatbot__status">Your reading companion</p></div>
            </div>
            <button class="book-chatbot__close" type="button" aria-label="Close chat"><i class="bi bi-x-lg"></i></button>
        </header>
        <div class="book-chatbot__messages" aria-live="polite">
            <div class="book-chatbot__message book-chatbot__message--bot">Hi! I can help you find your next read or explore the store. What are you in the mood for?</div>
            <div class="book-chatbot__typing">Assistant is thinking...</div>
        </div>
        <form class="book-chatbot__form">
            <textarea class="book-chatbot__input" rows="1" maxlength="2000" placeholder="Ask about books..." aria-label="Message"></textarea>
            <button class="book-chatbot__send" type="submit" aria-label="Send message"><i class="bi bi-arrow-up"></i></button>
        </form>
    </section>
    <button class="book-chatbot__toggle" type="button" aria-label="Open book assistant" aria-expanded="false"><i class="bi bi-chat-heart-fill"></i></button>
</div>

<script>
(() => {
    const root = document.querySelector('[data-chatbot]');
    if (!root || root.dataset.ready) return;
    root.dataset.ready = 'true';
    const panel = root.querySelector('.book-chatbot__panel');
    const toggle = root.querySelector('.book-chatbot__toggle');
    const close = root.querySelector('.book-chatbot__close');
    const form = root.querySelector('.book-chatbot__form');
    const input = root.querySelector('.book-chatbot__input');
    const messages = root.querySelector('.book-chatbot__messages');
    const history = [];

    const setOpen = (open) => {
        root.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', String(open));
        panel.setAttribute('aria-hidden', String(!open));
        if (open) input.focus();
    };
    const addMessage = (text, role, error = false) => {
        const item = document.createElement('div');
        item.className = `book-chatbot__message book-chatbot__message--${error ? 'error' : role}`;
        item.textContent = text;
        messages.insertBefore(item, root.querySelector('.book-chatbot__typing'));
        messages.scrollTop = messages.scrollHeight;
    };

    toggle.addEventListener('click', () => setOpen(!root.classList.contains('is-open')));
    close.addEventListener('click', () => setOpen(false));
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' && !event.shiftKey) { event.preventDefault(); form.requestSubmit(); }
    });
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const message = input.value.trim();
        if (!message || root.classList.contains('is-loading')) return;
        addMessage(message, 'user');
        history.push({ role: 'user', text: message });
        input.value = '';
        root.classList.add('is-loading');
        root.querySelector('.book-chatbot__send').disabled = true;
        try {
            const response = await fetch('{{ route('chatbot.message') }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ message, history: history.slice(-10) })
            });
            const data = await response.json();
            if (!response.ok) throw new Error(data.message || 'Request failed');
            addMessage(data.message, 'bot');
            history.push({ role: 'model', text: data.message });
        } catch (error) {
            addMessage(error.message || 'I could not answer right now. Please try again.', 'bot', true);
            history.pop();
        } finally {
            root.classList.remove('is-loading');
            root.querySelector('.book-chatbot__send').disabled = false;
            input.focus();
        }
    });
})();
</script>
