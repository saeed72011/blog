{{--<div wire:ignore.self>--}}
{{--    <div class="modal-success mr-1 mb-1 d-inline-block">--}}
{{--        <!-- Button trigger for Success theme modal -->--}}
{{--        <button type="button" class="btn btn-sm btn-outline-{{$color}}" data-toggle="modal" data-backdrop="false" data-target="#{{$idModal}}">--}}
{{--            {{$title}}--}}
{{--        </button>--}}

{{--        <!--Success theme Modal -->--}}
{{--        <div class="modal fade text-left" id="{{$idModal}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" style="display: none;" aria-hidden="false">--}}
{{--            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-{{$size}}" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title white" id="myModalLabel110">{{$title}}</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="بستن">--}}
{{--                            <i class="bx bx-x"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body line-height-2">--}}
{{--                       {{$slot}}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="row col-4">
<button class="btn btn-{{$color}} font-{{$size}}-3 ml-1" onclick='Livewire.emit("openModal", "{!! $live !!}")'>{{$title}}</button>
</div>