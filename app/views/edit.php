<div class="mt-5 d-flex justify-content-center">
    <form action="/" method="post">
        <div class="form-group">
            <label for="inputFirstName">First Name</label>
            <input type="text" name="firstName" class="form-control" id="inputFirstName">
        </div>
        <div class="form-group">
            <label for="inputSecondName">Second Name</label>
            <input type="text" name="secondName" class="form-control" id="inputSecondName">
        </div>
        <div class="form-group">
            <label for="inputGroup">Group</label>
            <input type="text" name="group" class="form-control" id="inputGroup">
        </div>
        <div class="form-group">
            <label for="inputPoints">Points</label>
            <input type="number" name="points" class="form-control" id="inputPoints">
        </div>
        <div class="d-flex flex-row">
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            <button type="submit" name="delete" class="btn btn-outline-danger ml-2">Delete</button>
        </div>
    </form>
</div>