<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <form>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" />
        <label class="form-label" for="form6Example1">Nome</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" class="form-control" />
        <label class="form-label" for="form6Example2">Cognome</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example3" class="form-control" />
    <label class="form-label" for="form6Example3">Company name</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example4" class="form-control" />
    <label class="form-label" for="form6Example4">Address</label>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">Email</label>
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
    <input type="number" id="form6Example6" class="form-control" />
    <label class="form-label" for="form6Example6">Phone</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="form6Example7" rows="4"></textarea>
    <label class="form-label" for="form6Example7">Additional information</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
    <label class="form-check-label" for="form6Example8"> Create an account? </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>