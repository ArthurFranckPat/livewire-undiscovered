s@php use App\Http\Livewire\Counter;use App\Livewire;use Illuminate\Support\Facades\Blade; @endphp
    <!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>


<body class="grid place-items-center h-screen bg-gray-100">
    @livewire(Counter::class)
</body>

<script>
    // find all elements with wire:snapshot as attribute
    const d = document.querySelectorAll("[wire\\:snapshot]").forEach(el => {
        let snapshot = JSON.parse(el.getAttribute('wire:snapshot'))
    console.log(snapshot)
    })
</script>

</html>

