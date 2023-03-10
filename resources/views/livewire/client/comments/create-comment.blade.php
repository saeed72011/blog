<div class="uix-entry__box" data-validate="3">
    <h4 class="uix-typo--style-uppercase uix-entry__box__title comment-reply-title">ثبت نظر</h4>
    <form method="post" wire:submit.prevent="save">


        <div class="uix-controls is-fullwidth">
            <input type="text" wire:model="name" class="js-uix-float-label" name="name" id="author">
            <label class="">نویسنده</label>
        </div>


        <div class="uix-controls uix-controls__textarea is-fullwidth">
            <textarea name="desc" wire:model="desc" class="js-uix-float-label" id="comments" rows="8"></textarea>
            <label>نظر</label>
        </div>

        <div class="uix-controls">
            <button type="submit" id="submit"
                    class="uix-btn uix-btn__border--thin uix-btn__size--s uix-btn__bg--primary">ارسال
            </button>
        </div>

    </form>
</div>

