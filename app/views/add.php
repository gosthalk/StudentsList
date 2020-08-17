<div class="mt-4 d-flex justify-content-center">
    <form action="/add" class="needs-validation" method="post">
        <div class="form-group">
            <label for="inputFirstName">First Name</label>
            <input type="text" name="firstName" class="form-control" placeholder="First Name" id="inputFirstName" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group">
            <label for="inputSecondName">Second Name</label>
            <input type="text" name="secondName" class="form-control" placeholder="Second Name" id="inputSecondName" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-group">
            <label for="inputGroup">Group</label>
            <input type="text" name="group" class="form-control" placeholder="Group" id="inputGroup" required>
            <div class="invalid-feedback">
                Enter a group name
            </div>
        </div>
        <div class="form-group">
            <label for="inputPoints">Points</label>
            <input type="number" name="points" class="form-control" placeholder="Points" id="inputPoints" required>
            <div class="invalid-feedback">
                Enter your points
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" name="add" class="btn btn-success">Add</button>
        </div>
    </form>
</div>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>