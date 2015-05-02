<?php include_once '_header-ptbr.php' ?>

<h3 id="top">Arquivos de Configuração</h3>

<h4>Arquivos e Vídeos Relecionados</h4>

<ul class="nobullets">
	<li><i class="icon-play"></i> <a href="#video1Modal" data-toggle="modal">Treinamento Básico - Vídeo #1: Estrutura de Arquivos</a></li>
</ul>

<div id="video1Modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="video1Label" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Phreeze - Vídeo de Treinamento</h3>
	</div>
	<div class="modal-body">
		<iframe width="530" height="298" src="http://www.youtube.com/embed/obIfetsy5Is" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
	</div>
</div>

<h4 id="overview">Visão Geral</h4>

<img src="images/config.png" class="pull-right" />

<p>Uma aplicação gerada com o Phreeze Builder terá três arquivos de configuração que são importantes que você entenda para poder customizar e disponibilizar sua aplicação.</p>

<p>Quando a aplicação Phreeze executa, o arquivo index.php é chamado. O arquivo index é muito pequeno e tem um único propósito, que é inicializar o <a href="dispatcher-ptbr.php">Dispatcher</a>.  O Dispatcher então determina quais  Controller + Method chamar. Antes que o  index.php possa executar esta função, várias classes do framework precisam ser incluídas e instanciadas.  index.php trabalha com três aquivos de configuração que são carregados na seguinte ordem:</p>

<ol>
<li><a href="#global">_global_config.php</a></li>
<li><a href="#app">_app_config.php</a></li>
<li><a href="#machine">_machine_config.php</a></li>
</ol>

<p>Não há nada de mágico sobre o nome destes arquivos e você está livre para customizá-los, combiná-los ou renomeá-los caso seja necessário. No entanto, estes arquivos de configuração desta maneira com o propósito de permitir que uma equipe de desenvolvimento possa trabalhar com uma base de código compartilhado em um sistema de controle de versão (git, svn, etc) sem criar conflitos.</p>

<h4 id="global">_global_config.php</h4>

<p>O arquivo de configuração global dfine uma singleton factory class <b>GlobalConfig</b> que é responsável por instanciar os diversos componentes necessários para o framework.  O framework precisa de diversos objetos prontos para poder trabalhar: Um Phreezer object, um Router, um RenderEngine e um
Context (ie session).  Você pode pensar no  GlobalConfig como um container para todos os vários subcomponentes do  Phreeze framework.</p>

<p>The reason this file is loaded first is because it creates the GlobalConfig object that 
contains all of the static properties and factory methods.  The other two configuration files, 
for the most part, set and change GlobalConfig's property values.</p>

<p>GlobalConfig is also a convenient place for you to store system-wide variables 
such as API credentials, mail server settings, etc.  Although it is recommended
that you only <i>define</i> the variables here, and then set their values either in 
_app_config.php or _machine_config.php as appropriate.</p>

<h4 id="app">_app_config.php</h4>

<p>_app_config.php is the file where the PHP include path is configured, the RenderEngine
is specified and <a href="routes-ptbr.php">routes</a> are defined.  This is a file that you will almost 
certainly customize in order to add, remove and change routes.</p>

<p>The application configuration file should only contain settings that pertain to the application
<i>regardless of which environment it is running</i>.  What this means is that you only should put
settings in this file if the values would be the same on localhost, staging and production servers.
For example, your routes and the RenderEngine used by the application will be the same regardless of 
whether it is moved from one machine to another.  The application configuration settings should not have
to be customized or tweaked from one machine to the next.</p>

<h4 id="machine">_machine_config.php</h4>

<p>The machine configuration file contains the settings that pertain to a specific server environment.
What this means is that the settings in this file will most likely change from one machine
to the next.  This allows you to run an application on a localhost
server, a staging server, multiple production servers, etc.  Each environment is likely to 
have different settings such as the database connection and root URL.</p>

<p>There are two settings in this file that you will most likely change when you install
your application onto a new server environment: 
<b>GlobalConfig::$CONNECTION_SETTING</b> and <b>GlobalConfig::$ROOT_URL</b>.</p>

<p>For team development environments, a suggestion is to add _machine_config.php to the
ignore list for your version control system and, in it's place, create a file such as
_machine_config.default.  Each time the application is installed, the developer will copy the default
file and edit the various settings as necessary for their particular installation.
This way your developers won't be constantly overwriting each others' machine-specific
settings every time they commit their work.</p>

<?php include_once '_footer-ptbr.php' ?>