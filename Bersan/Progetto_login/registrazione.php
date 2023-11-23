<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    

  <form class="needs-validation" id="justValidateForm">
  <div class="row mt-4">
    <div class="form-group col-md-3">
      <label class="active" for="validationCustom01">Nome</label>
      <input type="text" class="form-control" id="validationCustom01" value="Mario" required>
    </div>
    <div class="form-group col-md-3">
      <label class="active" for="validationCustom02">Cognome</label>
      <input type="text" class="form-control" id="validationCustom02" value="Rossi" required>
    </div>
    <div class="form-group col-md-3">
      <label for="validationCustomUsername">Username</label>
      <input type="text" class="form-control" id="validationCustomUsername" required>
    </div>
    <div class="form-group col-md-3">
      <label class="input-number-label active " for="validationAge">Età (minimo 18 anni)</label>
      <input type="number" data-bs-input class="form-control" id="validationAge" value="18" min="18" step="1" required>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="validationCustom03">Città</label>
      <input type="text" class="form-control" id="validationCustom03" required>
    </div>
    <div class="form-group col-md-3">
      <label for="validationCustom04">Provincia</label>
      <input type="text" class="form-control" id="validationCustom04" required>
    </div>
    <div class="form-group col-md-3">
      <label for="validationCustom05">CAP (5 cifre)</label>
      <input type="text" class="form-control" id="validationCustom05" required>
    </div>
  </div>
  <div class="row align-items-center">
    <div class="col-md-9 col-lg-6">
      <div class="form-check mt-0">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">Accetto i termini e le condizioni.</label>
      </div>
    </div>
    <div class="col-md-3 col-lg-6 mt-3 mt-md-0 d-flex justify-content-center justify-content-md-end justify-content-lg-start">
        <button class="btn btn-primary" type="submit">Invia</button>
    </div>
  </div>
</form>
<div class="row mt-4">
  <div class="col-12">
    <div aria-live="polite" id="errorMsgContainer"></div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const errorMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Attenzione</strong> Alcuni campi inseriti sono da controllare.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi avviso">';
    const errorWrapper = document.querySelector('#errorMsgContainer');
    const validate = new bootstrap.FormValidate('#justValidateForm', {
      errorFieldCssClass: 'is-invalid',
      errorLabelCssClass: 'form-feedback',
      errorLabelStyle: '',
      focusInvalidField: false,
    })
    validate
      .addField('#validationCustom01', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
      ])
      .addField('#validationCustom02', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
      ])
      .addField('#validationCustom03', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
      ])
      .addField('#validationCustom04', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
      ])
      .addField('#validationCustomUsername', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
      ])
      .addField('#validationAge', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
        {
          rule: 'minNumber',
          value: 18,
          errorMessage: 'Deve essere maggiore di 17'
        },
      ])
      .addField('#validationCustom05', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
        {
          rule: 'minLength',
          value: 5,
          errorMessage: 'Inserire 5 cifre'
        },
        {
          rule: 'maxLength',
          value: 5,
          errorMessage: 'Inserire 5 cifre'
        },
        {
          rule: 'number',
          errorMessage: 'Inserire un numero'
        },
      ])
      .addField('#invalidCheck', [
        {
          rule: 'required',
          errorMessage: 'Questo campo è richiesto'
        },
      ])
      .onSuccess(() => {
        document.forms['justValidate'].submit()
      })
      .onFail((fields) => {
        errorWrapper.innerHTML = '';
        errorWrapper.innerHTML = errorMessage
      })
  })
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>