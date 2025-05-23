<div>

    <section class="w-full">

        <div class="relative mb-6 w-full">
            <flux:heading size="xl" level="1">{{ __('User Creation') }}</flux:heading>
            <flux:subheading size="lg" class="mb-6">{{ __('Manage your user and account settings') }}</flux:subheading>
            <flux:separator variant="subtle" />
        </div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="false">

        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">🟢 Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" wire:submit="usercreation">
                        <div class="col-md-12">
                            <label for="inputtext" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputtext" wire:model="name">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" wire:model="email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputphone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="inputphone" wire:model="phone_no">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Gender</label>

                            <fieldset class="row mb-3">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios"
                                            id="gridRadios1" value="option1" checked wire:model="gender">
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios"
                                            id="gridRadios2" value="option2" wire:model="gender">
                                        <label class="form-check-label" for="gridRadios2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="gridRadios"
                                            id="gridRadios3" value="option3" wire:model="gender">
                                        <label class="form-check-label" for="gridRadios3">
                                            Others
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                wire:model="address">
                        </div>

                        <div class="col-md-6" wire:ignore>

                            <label for="inputcountry" class="form-label">Country</label>
                            <select id="inputcountry" class="form-select select2" wire:model="country">
                                <option>Choose...</option>
                                <option value="india">INDIA</option>
                                <option value="aus">AUSTRLIA</option>
                                <option value="france">FRANCE</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">State</label>
                            <select id="inputState" class="form-select" wire:model="state">
                                <option selected>Choose...</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Kolkatta">Kolkatta</option>
                                <option value="Paris">Paris</option>
                                <option value="Melbourn">Melbourn</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">City</label>
                            <select id="inputCity" class="form-select" wire:model="city">
                                <option selected>Choose...</option>
                                <option value="pondy">pondy</option>
                                <option value="cuddalore">cuddalore</option>
                                <option value="villupuram">villupuram</option>
                                <option value="asu">asu-1</option>
                                <option value="asu">asu-2</option>
                                <option value="asu">asu-3</option>
                                <option value="franc">franc-1</option>
                                <option value="franc">franc-2</option>
                                <option value="franc">franc-3</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip" wire:model="zip">
                        </div>
                        <div class="col-md-12">
                            <label for="inputphoto" class="form-label">Upload Photo</label>
                            <input type="file" class="form-control" id="inputphoto" wire:model="photo">
                        </div>
                        <div class="col-md-12">
                            <label for="formFile" class="form-label">Attach Documents</label>
                            <div class="ddfileupload" style="cursor: pointer;border:dashed"
                                ondragover="event.preventDefault()" ondrop=handledrop(event)>
                                <p class="text-center"> Drag and Drop / Select documents
                                <p>
                                    <input type="file" class="form-control d-none" id="formFile"
                                        wire:model="additonal_doc" multiple>



                            </div>

                        </div>
                        @if ($additonal_doc)
                            {{-- @dd($additonal_doc) --}}
                            <figure class="figure">
                                <figcaption class="figure-caption">Preview image.</figcaption>
                                @foreach ($additonal_doc as $index => $item)
                                    <div class="d-flex justify-between items-center border-b py-2">
                                        <figure class="figure">
                                            <img src={{ $item->temporaryUrl() }} class="img-thumbnail" alt="...">
                                        </figure>
                                        <button type="button" wire:click="removeFile({{ $index }})"
                                            class="text-red-500">Delete</button>
                                    </div>
                                @endforeach



                            </figure>
                        @endif


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <livewire:Employee-table theme="bootstrap-5" />

</div>

<script>
    $('#inputcountry').select2({
        dropdownParent: $('#exampleModal'),
        width: '100%' // Force correct width
    });

    document.addEventListener('livewire:load', function() {
        const modal = $('#exampleModal');

        function initSelect2() {
            const select = $('#inputcountry');

            if (select.data('select2')) {
                select.select2('destroy');
            }

            select.select2({
                dropdownParent: modal
            });

            select.off('change').on('change', function() {
                @this.set('inputcountry', $(this).val());
            });
        }

        // Init on modal open
        modal.on('shown.bs.modal', function() {
            initSelect2();
        });

        // Re-init after Livewire DOM updates
        Livewire.hook('message.processed', () => {
            if (modal.hasClass('show')) {
                initSelect2();
            }
        });
    });


    function handledrop(event) {
        event.preventDefault();
        const files = event.dataTransfer.files;

        for (let i = 0; i < files.length; i++) {
            @this.upload('additional_docs.' + @this.additional_docs.length, files[i],
                () => console.log('File uploaded'),
                () => console.error('Upload failed')
            );
        }

    }
    document.querySelector('.ddfileupload').addEventListener("click", function() {
        document.getElementById("formFile").click();
    });
</script>
</section>