<x-app-layout>
    <section>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-900">
                            {{ __('Announcement') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Create an announcement.') }}
                        </p>
                    </header>
                    <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-text-input type="hidden" name="id_user" :value="Auth::user()->id" />
                    
                        <div>
                            <x-input-label for="id_categorie" :value="__('Catégorie')" />
                            <select name="id_categorie" class="form-control mt-1 block w-full">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div>
                            <x-input-label for="titre" :value="__('Titre')" />
                            <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre')" />
                            <x-input-error class="mt-2" :messages="$errors->get('titre')" />
                        </div>
                    
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="form-control mt-1 block w-full">{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                    
                        <div>
                            <x-input-label for="telephone" :value="__('Téléphone de contact')" />
                            <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone')" />
                            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
                        </div>
                    
                        <div>
                            <x-input-label for="photo" :value="__('Image de l\'article')" />
                            <x-text-input id="photo" name="photo" type="file" class="form-control mt-1 block w-full" />
                        </div>
                    
                        <div>
                            <x-input-label for="echange" :value="__('Échange')" />
                            <x-text-input id="echange" name="echange" type="text" class="form-control mt-1 block w-full" />
                        </div>
                    
                        <div class="flex items-center gap-4">
                            <x-primary-button type="submit">Ajouter votre produit</x-primary-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
