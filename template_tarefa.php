<html>
<head>
<meta charset="utf-8" />
<title>Gerenciador de Tarefas</title>
<link rel="stylesheet" href="css/tarefas.css" type="text/css" />
</head>
<body>
<h1>Tarefa: <?php echo $tarefas->tarefa['nome']; ?></h1>
<p>
<a href="tarefas.php">Voltar para a lista de tarefas</a>
<p/>

<p>
<strong>Concluída:</strong>
<?php echo traduz_concluida($tarefas->tarefa['concluida']); ?>
</p>
<p>
<strong>Descrição:</strong>
<?php echo nl2br($tarefas->tarefa['descricao']); ?>
</p>
<p>
<strong>Prazo:</strong>
<?php echo traduz_data_para_exibir($tarefas->tarefa['prazo']); ?>
</p>
<p>
<strong>Prioridade:</strong>
<?php echo traduz_prioridade($tarefas->tarefa['prioridade']); ?>
</p>

<h2>Anexos</h2>
<!-- lista de anexos -->

<?php if (count($anexos) > 0) : ?>
<table>
<tr>
<th>Arquivo</th>
<th>Opções</th>
</tr>

<?php foreach ($anexos as $anexo) : ?>
<tr>
<td><?php echo $anexo['nome'] ?></td>
<td>
<a href="anexos/<?php echo $anexo['arquivo']; ?>">
Download
</a>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php else : ?>
<p>Não há anexos para esta tarefa.</p>
<?php endif; ?>
<!-- formulário para um novo anexo -->
<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Novo anexo</legend>

<input type="hidden" 
name="tarefa_id" value="<?php echo $tarefas->tarefa['id']; ?>" />

<label>
<?php if ($tem_erros && isset($erros_validacao['anexo'])) : ?>
	<span class="erro">
		<?php echo $erros_validacao['anexo']; ?>
	</span>
<?php endif; ?>

<input type="file" name="anexo" />
</label>

<input type="submit" value="Cadastrar" />
</fieldset>
</form>
</body>
</html>
