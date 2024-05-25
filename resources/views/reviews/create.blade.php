<style>
    .container {
    margin-top: 50px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

textarea.form-control {
    height: 150px;
}

input[type="number"].form-control {
    width: 100px;
}

select.form-control {
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

button[type="submit"].btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    padding: 0.5rem 1rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out,
        box-shadow 0.15s ease-in-out;
}

button[type="submit"].btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

    </style>




<form method="POST" action="{{ route('reviews.store') }}">


    @csrf

    <div class="form-group">
        <label for="review_text">Review Text</label>
        <textarea class="form-control" id="review_text" name="review_text" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label for="rating">Rating</label>
        <select class="form-control" id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>

    <div class="form-group">
        <label for="livre_id">Livre</label>
        <select class="form-control" id="livre_id" name="livre_id" required>
            @foreach($livres as $livre)
                <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
