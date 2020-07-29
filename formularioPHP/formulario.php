<?php

// @Criando formulário HTML através do PHP
echo "<form method='POST' action='processo.php'>"; // @Aqui estou enviando meus dados através do método POST, para o arquivo "Formulário.php" que irá tratá-los
echo "<h1>Pesquisa</h1>"; 
echo "<article>";

echo "<p>";
echo "<label>1.Qual sua faixa etaria? </label><br/>";
echo "<input type='radio' name='perg1' value='a' />a. Até 30 anos<br/>";
echo "<input type='radio' name='perg1' value='b' />b. De 30 a 50 anos<br/>";
echo "<input type='radio' name='perg1' value='c' />c. De 50 a 65 anos<br/>";
echo "<input type='radio' name='perg1' value='d' />d. Acima de 65 anos<br/>";
echo "</p>";

echo "<p>";
echo "<label>2.Qual seu convênio? </label><br/>";
echo "<input type='radio' name='perg2' value='a' />a.	INSS<br/>";
echo "<input type='radio' name='perg2' value='b' />b.	SIAPE<br/>";
echo "<input type='radio' name='perg2' value='c' />c.	Forças Armadas<br/>";
echo "<input type='radio' name='perg2' value='d' />d.	Outros<br/>";
echo "</p>";

echo "<p>";
echo "<label>1.Qual sua faixa salarial? </label><br/>";
echo "<input type='radio' name='perg3' value='a' />a.	Até 2 SM<br/>";
echo "<input type='radio' name='perg3' value='b' />b.	De 2 a 4 SM<br/>";
echo "<input type='radio' name='perg3' value='c' />c.	De 4 a 6 SM<br/>";
echo "<input type='radio' name='perg3' value='d' />d.	Acima de 6 SM<br/>";
echo "</p>";

echo "<p>";
echo "<label>1.Porquê realizou o empréstimo? </label><br/>";
echo "<input type='radio' name='perg4' value='a' />a.	Pagar contas<br/>";
echo "<input type='radio' name='perg4' value='b' />b.	Reforma da Casa<br/>";
echo "<input type='radio' name='perg4' value='c' />c.	Aquisição de veículos<br/>";
echo "<input type='radio' name='perg4' value='d' />d.	Outros<br/>";
echo "</p>";

echo "</article>";
echo "<input type='submit' value='Enviar'>";
echo "</form>";
 
 ?>