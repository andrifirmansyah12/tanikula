{{-- submenu --}}
<div class="flex items-center justify-center pt-24 md:pt-28 pb-10">
    <div class="space-x-7 text-lg">
        <a class="{{ Request::is('store*') ? 'active font-bold' : '' }}" href="/">Home</a>
        <a class="{{ Request::is('ticket*') ? 'active font-bold' : '' }}" href="/ticket">Category</a>
        <a class="{{ Request::is('blogs*') ? 'active font-bold' : '' }}" href="/blogs">History</a>
    </div>
</div>