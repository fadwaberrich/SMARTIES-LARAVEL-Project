
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Form</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('forms.update', $form->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="senderName">Sender Name</label>
                            <input type="text" name="senderName" class="form-control" value="{{ $form->senderName }}" required>
                        </div>
                        <div class="form-group">
                            <label for="receiverName">Receiver Name</label>
                            <input type="text" name="receiverName" class="form-control" value="{{ $form->receiverName }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" required>{{ $form->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
