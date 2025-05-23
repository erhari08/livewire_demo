<div>
    <form wire:submit.prevent="formsubmit">
        Name
        
        <input type="text" name="name" id="name" wire:model="name">
        <div>@error('name') {{ $message }} @enderror</div>

        Email
        <input type="text" name="email" id="email" wire:model="email">
        <div>@error('email') {{ $message }} @enderror</div>

        Address 
        <input type="text" name="address" id="address" wire:model="address">
        <div>@error('address') {{ $message }} @enderror</div>

        <button>Submit</button>
    </form>
</div>
