@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="alert alert-success ">
        <p>{{ session('success') }}</p>
    </div>
@endif
