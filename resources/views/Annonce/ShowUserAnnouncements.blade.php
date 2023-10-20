<x-app-layout>
    <section>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-900">
                            {{ __('My announcements') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Search for an announcement.') }}
                        </p>

                        <form action="{{ route('Search') }}" method="GET" class="mb-3">
                            @csrf
                            <div class="input-group">
                                <x-text-input type="text" name="search" class="form-control"
                                    placeholder="Rechercher par titre" />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                </div>
                            </div>
                        </form>

                    </header>
                    <div class="card-body p-0">
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table table-centered table-hover text-nowrap table-bordered mb-0 table-with-checkbox">
                                <thead class="bg-light">
                                    <tr>
                                        <th><strong>Titre</strong></th>
                                        <th><strong>Catégorie</strong></th>
                                        <th><strong>Description</strong></th>
                                        <th><strong>Téléphone de contact</strong></th>
                                        <th><strong>Échange souhaité</strong></th>
                                        <th><strong>Image</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userAnnouncements as $annonce)
                                        <tr class="border">
                                            <td class="border"><a href="#" class="text-reset">{{ $annonce->titre }}</a></td>
                                            <td>
                                                @if ($annonce->id_categorie)
                                                    {{ \App\Models\Category::find($annonce->id_categorie)->name }}
                                                @else
                                                    Catégorie non définie
                                                @endif
                                            </td>
                                            <td class="border">
                                                <!-- Add Bootstrap badge classes based on your logic -->
                                                {{ $annonce->description }}
                                            </td>
                                            <td>{{ $annonce->telephone }}</td>
                                            <td>{{ $annonce->echange }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $annonce->photo) }}" class="icon-shape icon-md">
                                            </td>
                                            <td>
                                                <div>
                                                    <li>
                                                        <form method="POST" action="{{ route('destroyBack', $annonce->id) }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i class="bi bi-trash me-3"></i>Delete</button>
                                                        </form>
                                                    </li>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
    </section>
</x-app-layout>
