
<div class="container">
    <h1>Form Details</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $form->id }}</td>
        </tr>
        <tr>
            <th>Sender Name</th>
            <td>{{ $form->senderName }}</td>
        </tr>
        <tr>
            <th>Receiver Name</th>
            <td>{{ $form->receiverName }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $form->description }}</td>
        </tr>
    </table>
    
    <a href="{{ route('forms.index') }}" class="btn btn-primary">Back</a>
</div>
