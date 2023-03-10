<div>
    <form wire:submit.prevent="save">

      <div class="uix-controls is-fullwidth">
            <input wire:model="name" type="text" class="js-uix-float-label" name="name">
            <label class="">نام</label>
        </div>

        <div class="uix-controls is-fullwidth">
            <input wire:model="title" type="text" class="js-uix-float-label" name="title">
            <label>موضوع</label>
        </div>

        <div class="uix-controls uix-controls__textarea is-fullwidth">
            <textarea wire:model="desc" name="desc" rows="5" class="js-uix-float-label"></textarea>
            <label>پیام</label>
        </div>
        <div class="uix-controls">
            <button type="submit"
                    class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary">
                ارسال
            </button>
        </div>

    </form>
</div>
