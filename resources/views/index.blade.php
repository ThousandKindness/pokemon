<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon</title>
</head>    
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Pokemon</h3>
                    <img src="https://en.wikipedia.org/wiki/Pok%C3%A9mon_%28TV_series%29#/media/File:International_Pok%C3%A9mon_logo.svg" class="rounded" style="width: 100%">

                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Pokemon</th>
                                    <th scope="col">Base Experience</th>
                                    <th scope="col">weight</th>
                                    <th scope="col">Stat</th>
                                    <th scope="col">Abilities</th>
                                    <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($Pokemons as $Pokemon)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/pokemon/'.$pokemon->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $pokemon->base_experience }}</td>
                                        <td>{{ $pokemon->weight }}</td>
                                        <td>{{ $pokemon->stat }}</td>
                                        <td>{{ $pokemon->abilities }}</td>
                                        <td>
                                            <img src="{{ $pokemon->image_url }}" class="rounded" style="width: 150px">
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Pokemon belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pokemon->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>
