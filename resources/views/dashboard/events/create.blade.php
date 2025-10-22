<x-dashboard.app :title="'Créer un événement'">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Créer un événement</h4>
        <a href="{{ route('dashboard.events.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.events.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Titre</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lieu</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required>
                        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date</label>
                        <input type="datetime-local" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
                        @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Prix</label>
                        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Capacité</label>
                        <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity') }}">
                        @error('capacity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Catégorie</label>
                        <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
                        @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image de l'événement</label>
                        <input type="file" 
                            name="image" 
                            class="form-control @error('image') is-invalid @enderror" 
                            accept="image/*"
                            onchange="previewImage(this)">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div id="imagePreview" class="mt-2" style="display: none;">
                            <img id="preview" src="#" alt="Aperçu de l'image" class="img-fluid rounded" style="max-height: 150px;">
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Statut</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="draft" {{ old('status')==='draft' ? 'selected' : '' }}>Brouillon</option>
                            <option value="published" {{ old('status')==='published' ? 'selected' : '' }}>Publié</option>
                            <option value="cancelled" {{ old('status')==='cancelled' ? 'selected' : '' }}>Annulé</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="featured">Mettre en avant</label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('dashboard.events.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    @endpush

</x-dashboard.app>
