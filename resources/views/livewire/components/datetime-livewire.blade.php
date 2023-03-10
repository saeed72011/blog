<div class="row">
    <div class=" text-dark">
        @if($startOrEnd == 'start')
            <label>زمان شروع</label>
            <br>
        @else
            <label>زمان پایان</label>
            <br>
        @endif
        <label for="second">ثانیه
            <input id="second" type="number" class="form-control" wire:model="second" min="0" max="59">
            <br>
            @error('second')
            <div class="error text-danger">{{ $message }}</div> @enderror
        </label>
        <label for="minute">دقیقه
            <input id="minute" type="number" class="form-control" wire:model="minute" min="0" max="59">
            <br>
            @error('minute')
            <div class="error text-danger">{{ $message }}</div> @enderror
        </label>
        <label for="hour">ساعت(24)
            <input id="hour" type="number" class="form-control" wire:model="hour" min="0" max="23">
            <br>
            @error('hour')
            <div class="error text-danger">{{ $message }}</div> @enderror
        </label>
        <span class="col-1"> </span>
        <label for="day">روز
            <input id="day" type="number" class="form-control" wire:model="day" min="1" max="31">
            <br>
            @error('day')
            <div class="error text-danger">{{ $message }}</div> @enderror
        </label>
        <label for="month">ماه
            <input id="month" type="number" class="form-control" wire:model="month" min="1" max="12">
            <br>
            @error('month')
            <div class="error text-danger">{{ $message }}</div> @enderror
        </label>
        <label for="year">سال
            <input id="year" type="number" class="form-control" wire:model="year" min="1400">
            <br>
            @error('year')
            <div class="error text-danger">{{ $message }}</div> @enderror
        </label>

    </div>

</div>
