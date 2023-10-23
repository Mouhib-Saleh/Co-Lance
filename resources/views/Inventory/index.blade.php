<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Co-Lance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
</head>
<body>
<div class="flex flex-col lg:flex-row md:flex-row" style="background-color: #F6F6F6;">


<div class="w-screen md:w-4/12 lg:w-2/12 bg-gray-900 shadow-lg md:h-screen lg:h-screen">
    <nav>
        <div class="hidden lg:flex md:flex items-center justify-center mt-5 -ml-2">
            <a href="/">
                <img src="https://res.cloudinary.com/dnnhnqiym/image/upload/v1695073341/YouTube_Thumbnail_1280x720_px_1_sonpfc.png" alt="Logo" style="width: 150px">
            </a>
        </div>

        <div class="mt-4 md:block">
            <div id="profile" class="space-y-3 mt-8">
                <img src="https://res.cloudinary.com/dnnhnqiym/image/upload/v1694623518/TDS-platform/e1g7fbd5r9ymja0jkxm6.jpg" alt="Admin picture" class="mx-auto md:w-16 rounded-full" style="width: 120px;">
                <div>
                    <h2 class="text-md font-medium text-red-600 text-center">Admin</h2>
                    <p class="text-gray-300 text-md text-center">Foulen ben foulen</p>
                </div>
            </div>
            <div class="pr-16 mt-10">
                <div class="p-4">
                    <div id="menu" class="flex flex-col space-y-2">
                        <a href="{{ url('/inventories') }}" class="text-sm text-white font-medium py-2 px-2 hover:bg-red-700 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Inventory</a>
                        <a href="{{ url('/addinventory') }}" class="text-sm text-white font-medium py-2 px-2 hover:bg-red-700 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Add Product to Inventory</a>
                        <a class="text-sm text-white font-medium py-2 px-2 hover:bg-red-700 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out" href="{{ url('inventories') }}">My Inventories</a>
                        <a href="{{ route('addinventory') }}" class="text-sm text-white font-medium py-2 px-2 hover:bg-red-700 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">Create Inventory</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="/auth" class="md:block lg:block text-sm mt-auto text-center -ml-4 font-medium text-gray-300 hover:text-red-700 hover:scale-105 rounded-md transition duration-150 ease-in-out">
            <span>Logout</span>
        </a>
    </div>
    </nav>
    <div class="flex flex-col overflow-y-auto flex-grow">
        <div class="bg-white shadow-lg p-6 mb-10">
            <h1 class="text-2xl font-bold text-blue-950">
                Inventories
            </h1>
        </div>

        <div class="flex flex-col flex-grow p-4 items-center">
            <div class="flex gap-3 flex-wrap justify-center mt-5">
                @foreach($listinventories as $inventory)
                <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow-lg">
                    <div class="rounded-t-lg w-full h-40">
                        <img src="{{ $inventory->image }}" alt="" class="rounded-t-lg w-full h-full object-cover" />
                    </div>
                    <div class="flex flex-col p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $inventory->InventoryName }}</h5>
                        <p class="mb-3 font-normal text-md text-gray-700">{{ $inventory->InventoryDescription }}</p>
                        <p class="text-gray-700">Location: {{ $inventory->InventoryLocation }}</p>
                        <p class="text-gray-700">Archive Date: {{ $inventory->InventoryArchiveDate }}</p>
                        <p class="text-gray-700">Category: {{ $inventory->InventoryCategory }}</p>
                        <p class="text-gray-700">Supplier: {{ $inventory->InventorySupplier }}</p>

                        <div class="flex justify-between">
                            <form method="POST" action="{{ route('inventories.destroy', ['id' => $inventory->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-500 border border-red-500 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 transition duration-300 ease-in-out">
                                    Supprimer
                                </button>
                            </form>
                            <a href="{{ route('inventoryedit', ['id' => $inventory->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-red-500 border border-red-500 rounded-lg hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300">
                                Modifier
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white mt-auto p-3 text-gray-600 text-center">
            <p>&copy; {{ date('Y') }} Copyrights TDS <span class="ml-2">&trade;</span></p>
        </div>
    </div>


</body>
</html>