<div class="mt-5 border border-dark">
    <div class="mt-1 d-flex justify-content-center">
        <h2 class="mt-5 text-danger" style="text-align: center;"> Вы действительно хотите удалить запись? </h2>
    </div>
    <form action="/delete" method="post">
        <div class="mb-5 d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-danger" name="delete_yes" > Да </button>
            <button type="submit" class="btn btn-primary mx-2" name="delete_no" > Нет </button>
        </div>
    </form>
</div>