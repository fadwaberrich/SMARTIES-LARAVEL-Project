<x-app-layout>
    <section>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-900">
                            {{ __('Create product') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Create a product for your announcement.') }}
                        </p>
                    </header>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-text-input type="hidden" name="annonce_id" :value="old('annonce_id', request('annonce_id'))" />
                    
                        <div>
                            <x-input-label for="product_name" :value="__('Product Name')" />
                            <x-text-input id="product_name" name="product_name" type="text" class="mt-1 block w-full" :value="old('product_name')" placeholder="Product Name" />
                            <x-input-error class="mt-2" :messages="$errors->get('product_name')" />
                        </div>
                    
                        <div>
                            <x-input-label for="price" :value="__('Product Price/Value')" />
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price')" placeholder="Product value" />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>
                    
                        <div>
                            <x-input-label for="weight" :value="__('Weight')" />
                            <x-text-input id="weight" name="weight" type="text" class="mt-1 block w-full" :value="old('weight')" placeholder="Weight" />
                            <x-input-error class="mt-2" :messages="$errors->get('weight')" />
                        </div>
                    
                        <div>
                            <x-input-label for="units" :value="__('Units')" />
                            <x-text-input id="units" name="units" type="text" class="mt-1 block w-full" :value="old('units')" placeholder="Units" />
                            <x-input-error class="mt-2" :messages="$errors->get('units')" />
                        </div>
                    
                        <div>
                            <x-input-label for="photo" :value="__('Product Images')" />
                            <x-text-input id="photo" name="photo" type="file" class="form-control" />
                            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                        </div>
                    
                        <div>
                            <x-input-label for="description" :value="__('Product Descriptions')" />
                            <x-text-input class="mt-1 block w-full" id="description" name="description"  placeholder="Product Description">{{ old('description') }}</x-text-input>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                    
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="form-control" :value="old('address')" placeholder="Address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                    
                        <div class="flex items-center gap-4">
                            <x-primary-button type="submit">Create Product</x-primary-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
