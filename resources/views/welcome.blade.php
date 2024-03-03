@php use App\Http\Livewire\Counter;use App\Livewire;use Illuminate\Support\Facades\Blade; @endphp
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
        el.addEventListener('click', function(event){
           if(!event.target.hasAttribute('wire:click')) return ;
           let method = event.target.getAttribute('wire:click');
           alert(method);
            fetch("/livewire",{
                method : 'POST',
                headers : {'Content-Type' : 'application/json'},
                body :JSON.stringify( {
                    snapshot,
                    callMethod : method
                })

            })
        })

        console.log(snapshot)
    })
</script>

</html>

