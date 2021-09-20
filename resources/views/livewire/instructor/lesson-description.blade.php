<div>
    <article class="bg-white shadow rounded-sm" x-data="{$open:false}">
        <div class="py-6 px-4 bg-gray-100">
            <header>
                <h2 x-on:click="$open = !$open" class="cursor-pointer">Descripción de la lección</h2>
            </header>
            <div x-show=$open >
                <hr class="my-2">
               

                @if ($lesson->description)
                <div wire:ignore
                wire:key="descriptionEditor{{$lesson->id}}">

                    <form wire:submit.prevent="update">
                        <textarea class="form-input w-full" 
                            id ="editorUpdate{{$lesson->id}}"
                            x-data
                            x-init="
                                ClassicEditor.create($refs.editorUpdate{{$lesson->id}}, {
                                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'blockQuote'],
                                    heading: {
                                        options: [
                                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                                        ]
                                    }
                                })
                                .then( function(editor){
                                    editor.model.document.on('change:data', () => {
                                        $dispatch('input', editor.getData())
                                    })
                                })
                                .catch( error => {
                                    data = error
                                } );
                            "

                            x-ref="editorUpdate{{$lesson->id}}"
                            wire:model.debounce.9999999ms="description.name">{{ $description['name'] }}</textarea>
                        @error('description.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end mt-2">
                            <button class=mr-2 type="button" wire:click="destroy">Eliminar</button>
                            <button type="submit">Actualizar</button>
                        </div>
                    </form>
                @else 
                    <div>
                        

                        <textarea class="form-input w-full" 
                        id ="editorAdd{{$lesson->id}}"
                        x-data
                        x-init="
                            ClassicEditor.create($refs.editorAdd{{$lesson->id}}, {
                                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'blockQuote'],
                                heading: {
                                    options: [
                                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                                    ]
                                }
                            })
                            .then( function(editor){
                                editor.model.document.on('change:data', () => {
                                    $dispatch('input', editor.getData())
                                })
                            })
                            .catch( error => {
                                data = error
                            } );
                        "

                        x-ref="editorAdd{{$lesson->id}}"
                        wire:model.debounce.9999999ms="name">{{ $name }}</textarea>

                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end mt-2">
                            <button wire:click="store">Agregar</button>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
        
    </article>

</div>
