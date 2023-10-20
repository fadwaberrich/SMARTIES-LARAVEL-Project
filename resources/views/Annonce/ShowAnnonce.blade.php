<x-app-layout>
    <section>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-900">
                            {{ __('Announcements') }}
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

                    <section class="col-lg-9 col-md-12">
                        <div class="row" >
                            @foreach ($annonces as $annonce)
                                <div class="row g-4 row-cols-1 mt-2">
                                    <div class="card card-product" style="border: 2px solid #0000FF;">                                        <!-- card body -->
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <!-- col -->
                                                <div class="col-md-4 col-12">
                                                    <div class="text-center position-relative">
                                                        <a href="shop-single.html">
                                                            <!-- img --><img
                                                                src="{{ asset('storage/' . $annonce->photo) }}"
                                                                alt="Grocery Ecommerce Template"
                                                                class="mb-3 img-fluid" /></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-12 flex-grow-1">
                                                    <!-- heading -->
                                                    <div class="text-small mb-1">
                                                        <a href="#!"
                                                            class="text-decoration-none text-muted"><small>
                                                                Catégorie:
                                                                @if ($annonce->id_categorie)
                                                                    {{ \App\Models\Category::find($annonce->id_categorie)->name }}
                                                                @else
                                                                    Catégorie non définie
                                                                @endif
                                                            </small></a>
                                                    </div>
                                                    <h2 class="fs-6">
                                                        <a href=""
                                                            class="text-inherit text-decoration-none">{{ $annonce->user->name }}</a>
                                                    </h2>
                                                    <div class=" mt-6">
                                                        <!-- price -->
                                                        <div><span class="text-dark">{{ $annonce->description }}</span>
                                                        </div>

                                                        <div class="mt-6">
                                                            <!-- price -->
                                                            <!-- btn -->
                                                            <div class="mt-3">
                                                                <a href="#!"
                                                                    class="btn btn-icon btn-sm btn-outline-gray-400 text-muted"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#quickViewModal"><i
                                                                        class="bi bi-eye" data-bs-toggle="tooltip"
                                                                        data-bs-html="true" title="Quick View"></i></a>
                                                            </div>
                                                            <!-- btn -->
                                                            <div class="mt-2">
                                                                <a href="#!" class="btn btn-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="16" height="16"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-shopping-bag me-2">
                                                                        <path
                                                                            d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z">
                                                                        </path>
                                                                        <line x1="3" y1="6"
                                                                            x2="21" y2="6"></line>
                                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                                    </svg>
                                                                    Barter!</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </section>
</x-app-layout>
