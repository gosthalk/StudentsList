<div class="mt-5 d-flex justify-content-center">
    <form action="/edit" method="post">
        <?php foreach ($var as $person) { ?>
        <div class="form-group">
            <label for="inputFirstName" >First Name</label>
            <input type="text" name="firstName" class="form-control" id="inputFirstName" placeholder="<?php echo $person['FirstName']; ?>">
        </div>
        <div class="form-group">
            <label for="inputSecondName">Second Name</label>
            <input type="text" name="secondName" class="form-control" id="inputSecondName" placeholder="<?php echo $person['SecondName']; ?>">
        </div>
        <div class="form-group">
            <label for="inputGroup">Group</label>
            <input type="text" name="group" class="form-control" id="inputGroup" placeholder="<?php echo $person['PartyId']; ?>">
        </div>
        <div class="form-group">
            <label for="inputPoints">Points</label>
            <input type="number" name="points" class="form-control" id="inputPoints" placeholder="<?php echo $person['Points']; ?>">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" name="edit" class="btn btn-primary"> Изменить </button>
        </div>
        <?php } ?>
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