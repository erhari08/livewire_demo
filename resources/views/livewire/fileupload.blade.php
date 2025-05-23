<div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">File Upload</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif


            <form wire:submit.prevent="fileupload">
                <div class="mb-8 text-center ddfileupload" style="cursor: pointer;border:dashed"
                    ondragover="event.preventDefault()" ondrop=handledrop(event)>
                    <p>Drag and Drop files</p>
                    <input class="form-control d-none" type="file" id="formFile" wire:model="file">
                    @if ($file)
                        <figure class="figure">
                            <figcaption class="figure-caption">Preview image.</figcaption>
                            <img src={{ $file->temporaryUrl() }} class="img-thumbnail" alt="...">
                        </figure>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Upload</button>

            </form>
            <div wire:loading wire:target="file">Uploading...</div>
        </div>
    </div>


</div>1
<script>
    function handledrop(event) {
        event.preventDefault();
        @this.upload('file',event.dataTransfer.files[0])
    }
    document.querySelector('.ddfileupload').addEventListener("click", function() {
        document.getElementById("formFile").click();
    });
</script>
