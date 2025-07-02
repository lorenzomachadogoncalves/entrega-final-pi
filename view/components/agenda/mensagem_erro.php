<div id="erroAlerta" class="alert alert-danger mt-3" role="alert"
  tabindex="-1" aria-live="assertive" aria-atomic="true" >
  <strong>Erro ao <?= ($origem === 'editar') ? 'editar' : 'cadastrar' ?>:</strong>
  <?= htmlspecialchars($erro) ?>
</div>

<script>
  window.onload = () => {
    document.getElementById('erroAlerta').focus();
  };
</script>