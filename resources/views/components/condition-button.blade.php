<button class="btn mt-1 w-100 btn-sm btn-outline-primary text-dark" wire:click="pushMathCharToFormula('p')">مبلغ
</button>
<button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula('(')">(</button>
<button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula(')')">)</button>
<button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula('+')">+</button>
<button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula('-')">-</button>
<button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula('*')">*</button>
<button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula('/')">/</button>
<br>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="برابر"
        wire:click="pushMathCharToFormula('==')">==
</button>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="نا برابر"
        wire:click="pushMathCharToFormula('!=')">!=
</button>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="بزرگتر از"
        wire:click="pushMathCharToFormula('>')">>
</button>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="کوچکتر از"
        wire:click="pushMathCharToFormula('<')"><
</button>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="بزرگتر مساوی"
        wire:click="pushMathCharToFormula('>=')">>=
</button>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="کوچکتر مساوی"
        wire:click="pushMathCharToFormula('<=')"><=
</button>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="و" wire:click="pushMathCharToFormula('and')">
    and
</button>
<button class="btn mt-1 btn-sm btn-outline-warning text-warning" title="یا" wire:click="pushMathCharToFormula('or')">
    or
</button>
<br>
@foreach(range(1,9) as $value)
    <button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula({{$value}})">
        {{$value}}
    </button>
@endforeach
<button class="btn mt-1 btn-sm btn-outline-primary text-primary" wire:click="pushMathCharToFormula(0)">
    {{0}}
</button>
<button class="btn mt-1 w-100 btn-sm btn-danger" wire:click="clear()">ریست شرط</button>
