-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 12/04/2019 às 13:58
-- Versão do servidor: 5.5.57-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `Sharebooks`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Conversa`
--

CREATE TABLE IF NOT EXISTS `Conversa` (
  `id_conversa` int(11) NOT NULL AUTO_INCREMENT,
  `cd_livrosolicitado` varchar(20) NOT NULL,
  `cd_livroofertado` varchar(20) NOT NULL,
  `cd_usuariosolicitante` int(11) NOT NULL,
  `cd_usuariosolicitado` int(11) NOT NULL,
  `ds_tipo` int(11) NOT NULL,
  `qt_tempo` varchar(30) NOT NULL,
  `ic_finalizado` tinyint(1) NOT NULL,
  `cd_acordo` int(11) NOT NULL,
  PRIMARY KEY (`id_conversa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Fazendo dump de dados para tabela `Conversa`
--

INSERT INTO `Conversa` (`id_conversa`, `cd_livrosolicitado`, `cd_livroofertado`, `cd_usuariosolicitante`, `cd_usuariosolicitado`, `ds_tipo`, `qt_tempo`, `ic_finalizado`, `cd_acordo`) VALUES
(75, 'gSMvDwAAQBAJ', '', 2038, 2029, 1, '', 0, 0),
(76, 'gSMvDwAAQBAJ', 'bBsnB8ecpzAC', 2039, 2029, 2, '', 1, 2029);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Estante`
--

CREATE TABLE IF NOT EXISTS `Estante` (
  `cd_usuario` int(11) NOT NULL,
  `cd_livro` varchar(20) NOT NULL,
  `ds_estado` varchar(30) NOT NULL,
  `cd_emp` tinyint(1) NOT NULL,
  `cd_doa` tinyint(1) NOT NULL,
  `cd_troc` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_usuario`,`cd_livro`),
  KEY `cd_livro` (`cd_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Estante`
--

INSERT INTO `Estante` (`cd_usuario`, `cd_livro`, `ds_estado`, `cd_emp`, `cd_doa`, `cd_troc`) VALUES
(2029, '4tLlDAAAQBAJ', 'Novo', 0, 1, 1),
(2029, 'bBsnB8ecpzAC', 'Rabiscado, sem capa', 0, 1, 1),
(2029, 'bGPXelskQVIC', 'Conservado', 1, 0, 1),
(2029, 'gSMvDwAAQBAJ', 'Usado, sem capa, conservado', 1, 1, 1),
(2029, 'k7SlDQAAQBAJ', 'Novo', 1, 0, 1),
(2029, 'lYIbAAAAQBAJ', 'Conservado', 0, 0, 0),
(2029, 'OLB1CWIuMf4C', 'Usado, com anotações', 1, 0, 0),
(2029, 'tCFdvgAACAAJ', 'Com anotações, sem capa', 0, 0, 1),
(2029, 'zSK6FeI5q5kC', 'Usado, conservado', 0, 1, 0),
(2038, '2wQZBQAAQBAJ', 'Novo', 1, 0, 0),
(2038, '94wwDwAAQBAJ', 'Novo', 0, 1, 0),
(2038, 'Aqk-DwAAQBAJ', 'Conservado', 1, 0, 1),
(2038, 'bBsnB8ecpzAC', 'Novo', 0, 0, 1),
(2038, 'HQQ-AQAAQBAJ', 'Usado', 0, 0, 0),
(2038, 'QXpgAwAAQBAJ', 'Conservado', 1, 0, 0),
(2038, 'r3IbCwAAQBAJ', 'Sem capa', 0, 1, 1),
(2038, 'WCgpyBBBBfIC', 'Conservado', 1, 1, 1),
(2038, 'Z46cAwAAQBAJ', 'Usado', 0, 0, 1),
(2039, 'bBsnB8ecpzAC', 'Conservado', 1, 1, 0),
(2040, 'bBsnB8ecpzAC', 'Usado, sem capa', 1, 0, 1),
(2040, 'qSwmmTth3usC', 'Novo, usado, com anotações, ra', 1, 0, 1),
(2041, 'FGSCCwAAQBAJ', 'Usado, com anotações, sem capa', 1, 0, 1),
(2042, 'PlIsDwAAQBAJ', '', 0, 0, 0),
(2042, 'ZiE0DwAAQBAJ', 'Novo', 0, 0, 0),
(2043, '5s-YeEV0hGsC', 'Usado', 1, 0, 0),
(2043, 'gV1nhvItuoAC', 'Usado', 1, 0, 0),
(2044, 'wPWnBAAAQBAJ', 'Sem capa, conservado', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Livro`
--

CREATE TABLE IF NOT EXISTS `Livro` (
  `cd_livro` varchar(20) NOT NULL,
  `nm_livro` varchar(50) NOT NULL,
  `nm_autor` varchar(30) NOT NULL,
  `cd_isbn` varchar(20) NOT NULL,
  `ds_capalivro` varchar(100) NOT NULL,
  `ds_bannerlivro` varchar(100) NOT NULL,
  `ds_livro` longtext NOT NULL,
  `cd_class` int(11) DEFAULT NULL,
  `ds_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Livro`
--

INSERT INTO `Livro` (`cd_livro`, `nm_livro`, `nm_autor`, `cd_isbn`, `ds_capalivro`, `ds_bannerlivro`, `ds_livro`, `cd_class`, `ds_categoria`) VALUES
('2wQZBQAAQBAJ', 'Will e Will', 'John Green eamp; David Levitha', '9892328566', 'http://books.google.com/books/content?id=2wQZBQAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=2wQZBQAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Evanston não fica muito longe de Naperville nos subúrbios de Chicago, mas os jovens Will Grayson e Will Grayson bem que podiam viver em planetas diferentes. Quando o destino os leva à mesma encruzilhada, os Will Graysons veem as suas vidas a sobreporem-se e a seguirem novas e inesperadas direções. Com um empurrão de amigos novos e velhos - incluindo o enorme e enormemente fabuloso Tiny Cooper, jogador ofensivo na equipa de futebol americano da escola e autor de musicais - Will e Will embarcam nas suas respetivas aventuras românticas e na produção épica do musical mais extraordinário da história.John Green é autor de vários bestsellers do New York Times. Também é coautor, com David Levithan, de Will e Will. Em 2006 recebeu o Michael L. Printz Award, em 2009 um Edgar Award, e foi duas vezes finalista do Los Angeles Times Book Prize. David Levithan é um autor premiado de vários livros para adolescentes que foram bestsellers do New York Times. Também é coautor, com John Green, de Will e Will. Trabalha ainda como editor e, no seu tempo livre, tira muitas fotografias.', 0, 'Fiction / Romance / General'),
('4tLlDAAAQBAJ', 'Sete minutos depois da meia-noite', 'Patrick Ness', '8581638252', '/resources/img/indisponivel.jpg', '/resources/img/capa.png', '<b>O livro que inspirou o filme estrelado por SIGOURNEY WEAVER, FELICITY JONES, TOBY KEBBELL, LEWIS MACDOUGALL e LIAM NEESON</b> Uma aventura que mistura fantasia e realidade. <b>Sinopse:</b> Conor é um garoto de 13 anos e está com muitos problemas na vida. A mãe dele está muito doente, passando por tratamentos rigorosos. Os colegas da escola agem como se ele fosse invisível, exceto por Harry e seus amigos que o provocam diariamente. A avó de Conor, que não é como as outras avós, está chegando para uma longa estadia. E, além do pesadelo terrível que o faz acordar em desespero todas as noites, às 00h07 ele recebe a visita de um monstro que conta histórias sem sentido. O monstro vive na Terra há muito tempo, é grandioso e selvagem, mas Conor não teme a aparência dele. Na verdade, ele teme o que o monstro quer, uma coisa muito frágil e perigosa. O monstro quer a VERDADE. Baseado na ideia de Siobhan Dowd, Sete minutos depois da meia-noite é um livro em que <b>fantasia e realidade se misturam</b>. Ele nos fala dos sentimentos de perda, medo e solidão e também da coragem e da compaixão necessárias para ultrapassá-los.', 0, 'Fiction / Fantasy / General, Fiction / General, Drama / General, Fiction / Literary'),
('5s-YeEV0hGsC', 'Ponto de impacto', 'Dan Brown', '8580410878', 'http://books.google.com/books/content?id=5s-YeEV0hGsC&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=5s-YeEV0hGsC&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Às vésperas da eleição presidencial norte-americana, uma incrível descoberta da NASA pode mudar todo o cenário político. A agência espacial encontra um enorme meteorito enterrado na geleira Milne, no alto Ártico, contendo fósseis – uma prova irrefutável da existência de vida extraterrestre.A extraordinária revelação é feita exatamente quando a NASA se torna uma questão central na disputa pela presidência. O candidato à reeleição, o presidente Zachary Herney, vem perdendo pontos com os ataques de seu oponente, o senador Sedgewick Sexton, à ineficiência e aos gastos excessivos da agência espacial.Para evitar especulações sobre a autenticidade do meteorito, a Casa Branca convoca Rachel Sexton, analista do NRO – o Escritório Nacional de Reconhecimento, importante organização da comunidade de inteligência americana – e filha do adversário do presidente, para verificar os dados levantados pela NASA. Além dela, quatro renomados cientistas são enviados para o Ártico, entre eles o oceanógrafo e apresentador de TV Michael Tolland.Quando começam a levantar suspeitas de fraude, os cientistas passam a ser caçados por uma equipe de assassinos profissionais, controlada à distância por um inimigo poderoso que precisa eliminá-los um a um para resguardar seu segredo. Tentando escapar da morte certa, Rachel e Michael enfrentam os perigos da gelada paisagem do Ártico e inúmeras outras ameaças enquanto tentam descobrir quem se esconde por trás dessa genial armação.Mundialmente reconhecido por seu talento para misturar ciência, história e política em livros de grande sucesso, Dan Brown elaborou uma trama na qual todas as impressões são enganosas e há surpresas ocultas a cada página.Ponto de Impacto é mais um suspense de tirar o fôlego.', 5, 'Fiction / Science Fiction / General, Fiction / Thrillers / Suspense'),
('94wwDwAAQBAJ', 'Tartarugas até lá embaixo', 'John Green', '8551002031', 'http://books.google.com/books/content?id=94wwDwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=94wwDwAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', '<p> Depois de seis anos, milhões de livros vendidos, dois filmes de sucesso e uma legião de fãs apaixonados ao redor do mundo, John Green, autor do inesquecível <i>A culpa é das estrelas</i>, lança o mais pessoal de todos os seus romances: <i>Tartarugas até lá embaixo</i>.</p> <p>A história acompanha a jornada de Aza Holmes, uma menina de 16 anos que sai em busca de um bilionário misteriosamente desaparecido – quem encontrá-lo receberá uma polpuda recompensa em dinheiro – enquanto lida com o transtorno obsessivo-compulsivo (TOC).</p><p><br></p> Repleto de referências da vida do autor – entre elas, a tão marcada paixão pela cultura pop e o TOC, transtorno mental que o afeta desde a infância –, <i>Tartarugas até lá embaixo </i>tem tudo o que fez de John Green um dos mais queridos autores contemporâneos. Um livro incrível, recheado de frases sublinháveis, que fala de amizades duradouras e reencontros inesperados, fan-fics de <i>Star Wars</i> e – por que não? – peculiares répteis neozelandeses.', 0, 'Fiction / Romance / General'),
('Aqk-DwAAQBAJ', 'Mil Vezes Adeus', 'John Green', '9892340795', 'http://books.google.com/books/content?id=Aqk-DwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=Aqk-DwAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'O amor não é uma tragédia ou um fracasso, mas uma dádiva.Não era intenção de Aza, uma jovem de dezasseis anos, investigar o enigmático desaparecimento do bilionário Russell Pickett. Mas estão em jogo uma recompensa de cem mil dólares e a vontade da sua melhor amiga Daisy, que se sente fascinada pelo mistério. Juntas, irão transpor a distância (tão curta, e no entanto tão vasta) que as separa de Davis, o filho do desaparecido.Mas Aza debate-se também com as suas batalhas interiores. Por mais que tente ser uma boa filha, amiga, aluna, e quiçá detetive, tem de lidar diariamente com as suas penosas e asfixiantes «espirais de pensamentos». Como pode ser uma boa amiga se está constantemente a pôr entraves às aventuras que lhe surgem no caminho? Como pode ser uma boa filha se é incapaz de exprimir o que sente à mãe? Como pode ser uma boa namorada se, em vez de desfrutar de um beijo, só consegue pensar nos milhões de bactérias que as suas bocas partilham?Neste tão aguardado regresso, John Green, autor premiado de A Culpa É Das Estrelas e À Procura de Alaska conta, com dolorosa intensidade, a história de Aza, numa tentativa de partilhar connosco os dramas da doença que o afeta desde a infância. O resultado é um romance brilhante sobre o amor, a resiliência, e o poder da amizade.', 0, 'Fiction / Romance / General'),
('bBsnB8ecpzAC', 'A culpa é das estrelas', 'John Green', '8580572258', 'http://books.google.com/books/content?id=bBsnB8ecpzAC&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=bBsnB8ecpzAC&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Hazel é uma paciente terminal. Ainda que, por um milagre da medicina, seu tumor tenha encolhido bastante — o que lhe dá a promessa de viver mais alguns anos —, o último capítulo de sua história foi escrito no momento do diagnóstico. Mas em todo bom enredo há uma reviravolta, e a de Hazel se chama Augustus Waters, um garoto bonito que certo dia aparece no Grupo de Apoio a Crianças com Câncer. Juntos, os dois vão preencher o pequeno infinito das páginas em branco de suas vidas. Inspirador, corajoso, irreverente e brutal, A culpa é das estrelas é a obra mais ambiciosa e emocionante de John Green, sobre a alegria e a tragédia que é viver e amar.', 4, 'Fiction / Romance / General'),
('bGPXelskQVIC', 'A travessia', 'William P. Young', '8580411165', 'http://books.google.com/books/content?id=bGPXelskQVIC&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=bGPXelskQVIC&printsec=frontcover&img=1&zoom=6&edge=curl&img', '<b>DA LISTA DE MAIS VENDIDOS DA REVISTA VEJA.</b> <b>William P. Young já vendeu 5 milhões de livros no Brasil</b> Um derrame cerebral deixa Anthony Spencer, um multimilionário egocêntrico, em coma. Quando “acorda”, ele se vê em um mundo surreal habitado por um estranho, que descobre ser Jesus, e por uma idosa que é o Espírito Santo. À sua frente se descortina uma paisagem que lhe revela toda a mágoa e a tristeza de sua vida terrena. Jamais poderia ter imaginado tamanho horror. Debatendo-se contra um sofrimento emocional insuportável, ele implora por uma segunda chance. Sua prece é ouvida e ele é enviado de volta à Terra, onde viverá uma experiência de profunda comunhão com uma série de pessoas e terá a oportunidade de reexaminar a própria vida. Nessa jornada, precisará “enxergar” através dos olhos dos outros e conhecer suas visões de mundo, suas esperanças, seus medos e seus desafios. Na busca de redenção, Tony deverá usar um poder que lhe foi concedido: o de curar uma pessoa. Será que ele terá coragem de fazer a escolha certa?', 0, 'Fiction / Christian / General, Religion / General'),
('FGSCCwAAQBAJ', 'Anne Frank', 'Bruno Biasetto', '8584784381', 'http://books.google.com/books/content?id=FGSCCwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=FGSCCwAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Conheça um pouco mais sobre a história da construção de Anne Frank', 0, 'Juvenile Nonfiction / History / General'),
('gSMvDwAAQBAJ', 'STAR WARS - Legado de sangue', 'Claudia Gray', '8576573733', 'http://books.google.com/books/content?id=gSMvDwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=gSMvDwAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Quando a Aliança Rebelde derrubou o Império, a princesa Leia acreditava que um longo período de paz iria começar. Mas o que se seguiram foram décadas de brigas sem fim e rixas partidárias no senado da Nova República. Leia, agora uma senadora influente, está perdendo a fé na política enquanto assiste seus colegas no senado, desesperados por mudanças, tomarem medidas que podem destruir o governo igualitário recém-criado. A última princesa de Alderaan torna-se a única esperança da democracia em seu momento mais frágil, mas o passado e o futuro com o lado sombrio da Força a perseguem. O treinamento Jedi de seu filho Ben a preocupa, especialmente depois que ele e Luke param de lhe mandar mensagens, e um dos maiores segredos da família pode vir à tona e colocar em cheque sua credibilidade.', 0, 'Fiction / Action & Adventure'),
('gV1nhvItuoAC', 'O Código Da Vinci', 'Dan Brown', '8580410851', 'http://books.google.com/books/content?id=gV1nhvItuoAC&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=gV1nhvItuoAC&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Um assassinato dentro do Museu do Louvre, em Paris, traz à tona uma sinistra conspiração para revelar um segredo que foi protegido por uma sociedade secreta desde os tempos de Jesus Cristo. A vítima é o respeitado curador do museu, Jacques Saunière, um dos líderes dessa antiga fraternidade, o Priorado de Sião, que já teve como membros Leonardo da Vinci, Victor Hugo e Isaac Newton.Momentos antes de morrer, Saunière deixa uma mensagem cifrada que apenas a criptógrafa Sophie Neveu e Robert Langdon, um simbologista, podem desvendar. Eles viram suspeitos e detetives enquanto tentam decifrar um intricado quebra-cabeças que pode lhes revelar um segredo milenar que envolve a Igreja Católica.Apenas alguns passos à frente das autoridades e do perigoso assassino, Sophie e Robert vão à procura de pistas ocultas nas obras de Da Vinci e se debruçam sobre alguns dos maiores mistérios da cultura ocidental - da natureza do sorriso da Mona Lisa ao significado do Santo Graal. Mesclando os ingredientes de um envolvente suspense com informações sobre obras de arte, documentos e rituais secretos, Dan Brown consagrou-se como um dos autores mais brilhantes da atualidade.', 5, 'Fiction / Thrillers / Suspense, Fiction / Action & Adventure'),
('HQQ-AQAAQBAJ', 'Deixe a neve cair', 'John Green, Lauren Myracle, Ma', '8581222897', '/resources/img/indisponivel.jpg', '/resources/img/capa.png', 'Na noite de natal, uma inesperada tempestade de neve transforma uma pequena cidade num inusitado refúgio romântico, do tipo que se vê apenas em filmes. Bem, mais ou menos. Porque ficar presa à noite dentro de um trem retido pela nevasca no meio do nada, apostar corrida com os amigos no frio congelante até a lanchonete mais próxima ou lidar sozinha com a tristeza da perda do namorado ideal não seriam momentos considerados românticos para quem espera encontrar o verdadeiro amor. Mas os autores bestsellers John Green, Maureen Johnson e Lauren Myracle revelam a surpreendente magia do Natal nestes três hilários e encantadores contos de amor, interligados, com direito a romances, aventuras e beijos de tirar o fôlego.<br> O livro <i>Deixe a neve cair</i> já entrou nas listas de mais vendidos da Veja, O Globo e Folha de S. Paulo.', 5, 'Fiction / Romance / General, Juvenile Fiction / Holidays & Celebrations / Christmas & Advent, Fictio'),
('k7SlDQAAQBAJ', 'STAR WARS - Lordes dos Sith', 'Paul S. Kemp', '8576573571', 'http://books.google.com/books/content?id=k7SlDQAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=k7SlDQAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Anakin Skywalker, cavaleiro Jedi, é só uma distante lembrança. Darth Vader, recém nomeado como lorde Sith, está em ascensão. O aprendiz escolhido pelo Imperador provou rapidamente seu compromisso com o lado sombrio. Porém, a história da ordem Sith envolve duplicidade, traição e pupilos violentamente tomando o lugar de seus mestres, e a verdadeira lealdade de Vader ainda não foi provada – até agora. Em Ryloth, planeta explorado e escravizado pelo Império, um colérico movimento de resistência vai tentar atacar o coração de uma ditadura implacável, em uma ousada missão para assassinar seus líderes. Para o Imperador e Darth Vader, Ryloth se torna mais do que uma insurreição a ser detida. Quando uma emboscada os derruba na superfície do planeta, o relacionamento entre eles será colocado à prova como nunca antes. Podendo contar apenas com seus sabres de luz, o lado negro da Força e a ajuda um do outro, os dois Sith precisarão decidir se os laços brutais que dividem os farão aliados vitoriosos ou adversários letais.', 0, 'Fiction / Science Fiction / General'),
('lYIbAAAAQBAJ', 'Uma longa jornada', 'Nicholas Sparks', '8580411963', 'http://books.google.com/books/content?id=lYIbAAAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=lYIbAAAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', '<b>DA LISTA DE MAIS VENDIDOS DA REVISTA VEJA.</b> Desde que terminou com o namorado, Sophia tem evitado sair de casa, porque ele a persegue aonde quer que vá. Após muita insistência de sua melhor amiga, ela acaba cedendo e vai a um rodeio. O que não podia imaginar era que encontraria um grande amor. Luke é um jovem habilidoso que ajuda a mãe com todo tipo de tarefa na fazenda da família. No entanto, um terrível acidente os deixou numa situação econômica difícil e eles podem perder a propriedade – a menos que Luke volte à ativa e vença as competições de montaria em touros. Quando Luke e Sophia começam a se relacionar, ela não entende por que a mãe dele fica tão chateada com sua volta à arena. O que ela não sabe é que o peão guarda um terrível segredo que pode acabar com os sonhos de todos. Perto dali, o doce e apaixonado Ira, de 91 anos, sofre um acidente de carro. Preso nas ferragens e sem muitas esperanças de ser encontrado, vê o filme de sua vida passar diante de seus olhos e relembra os detalhes de seu longo e feliz casamento com Ruth. Quem sabe as surpresas que a vida poderá trazer quando esses três destinos se cruzarem? Em <i>Uma longa jornada</i>, o campeão de vendas Nicholas Sparks conta uma história emocionante e inspiradora sobre o poder que o amor tem de superar até os mais difíceis obstáculos.', 0, 'Fiction / Romance / Contemporary, Fiction / Romance / General'),
('OLB1CWIuMf4C', 'Inferno', 'Dan Brown', '858041153X', 'http://books.google.com/books/content?id=OLB1CWIuMf4C&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=OLB1CWIuMf4C&printsec=frontcover&img=1&zoom=6&edge=curl&img', '<b><i>Inferno</i> é uma leitura eletrizante e um convite a pensarmos no papel da ciência para o futuro da humanidade.</b> No meio da noite, o renomado simbologista Robert Langdon acorda de um pesadelo, num hospital. Desorientado e com um ferimento à bala na cabeça, ele não tem a menor ideia de como foi parar ali. Ao olhar pela janela e reconhecer a silhueta do Palazzo Vecchio, em Florença, Langdon tem um choque. Ele nem se lembra de ter deixado os Estados Unidos. Na verdade, não tem nenhuma recordação das últimas 36 horas. Quando um novo atentado contra a sua vida acontece dentro do hospital, Langdon se vê obrigado a fugir e, para isso, conta apenas com a ajuda da jovem médica Sienna Brooks. De posse de um macabro objeto que Sienna encontrou no paletó de Langdon, os dois têm que seguir uma série inquietante de códigos criada por uma mente brilhante, obcecada tanto pelo fim do mundo quanto por uma das maiores obras-primas literárias de todos os tempos: <i>A Divina Comédia</i>, de Dante Alighieri.', 5, 'Fiction / Mystery & Detective / International Mystery & Crime, Fiction / Action & Adventure, Fiction'),
('PlIsDwAAQBAJ', 'Conexão com a Prosperidade', 'Bruno J. Gimenes, Patrícia Cân', '8564463385', 'http://books.google.com/books/content?id=PlIsDwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=PlIsDwAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Sucesso, Abundância, Prosperidade e Riqueza não são uma questão de sorte, mas de conhecimento, empenho e dedicação. Muito mais do que isso, é uma questão de conexão e sintonia de pensamentos e emoções. Nesta obra, os autores revelam todos os segredos da Conexão com a Prosperidade, um estado mental e emocional que o levará a uma vida plena de conquistas e realizações em todos os aspectos que você deseja. OS EXERCÍCIOS PRÁTICOS DESTE LIVRO VÃO ENSINAR: - Qual é o seu comportamento que dita a sua prosperidade e como fazer os ajustes necessários; - Como se conectar com a energia da prosperidade; - Como se libertar das crenças que atrasam sua vida; - Como construir um lastro para ter liberdade financeira; - Como se organizar para que a prosperidade venha até você; - Como tornar-se um imã que só atrai situações incríveis; - Como ter a vida dos seus sonhos e a segurança de que você precisa.', 0, 'Self-Help / Spiritual'),
('qSwmmTth3usC', 'Kama Sutra XXX', 'Alicia Gallotti', '8576659328', '/resources/img/indisponivel.jpg', '/resources/img/capa.png', 'Original e atrevido, provocativo e direto, Kama Sutra XXX desvenda o lado oculto do sexo e da mente. Você descobrirá jogos e condutas que o levarão a se excitar só de olhar, a unir dor e prazer, a submeter-se e dominar, a se disfarçar para desejar e a querer mais de dois na cama... Essas são algumas das variantes sexuais até agora inconfessáveis, e que este livro revela com detalhes, histórias reais e ilustrações explícitas.', 0, 'Self-Help / Sexual Instruction'),
('QXpgAwAAQBAJ', 'À Procura de Alaska', 'John Green', '9892325745', '/resources/img/indisponivel.jpg', '/resources/img/capa.png', '', 0, 'Fiction / Romance / General'),
('r3IbCwAAQBAJ', 'Quando a Neve Cai', 'Maureen Johnson, John Green, L', '9898626933', '/resources/img/indisponivel.jpg', '/resources/img/capa.png', 'Numa cidade isolada por uma das maiores tempestades de neve dos últimos cinquenta anos, três histórias, oito raparigas e rapazes e mais uns quantos caminhos vão cruzar-se num romance brilhante, mágico e divertido, a que não faltarão fragmentos de amor, laços de amizade, uma maratona de filmes do James Bond e beijos muito apaixonados.<br> Um livro escrito a três mãos, num romance brilhante e mágico para os amantes de histórias de amor e aventuras.<br> CRÍTICAS<br> «Com um enredo bem estruturado, cada ponta solta deixada por um autor é devidamente atada pelo que se lhe segue. Uma leitura maravilhosa para qualquer altura do ano.» - Booklist<br> «Este livro é, sem dúvida, um dos meus livros preferidos. Na realidade é um livro mais que perfeito. Quando a Neve Cai será a minha leitura de Natal por muitos anos, e tenho a certeza de que se lerem este livro maravilhoso também virá a ser a vossa » - The Guardian<br> «Três dos mais bem-sucedidos autores norte-americanos de ficção para jovens adultos juntam-se para interligar três histórias passadas em plena véspera de Natal na mesma pequena cidade da Carolina do Norte. Cultura contemporânea, acontecimentos cheios de humor e romantismo e personagens fortes engrandecem esta colaboração empenhada.» - Kirkus Reviews<br> «Ternurentas mas sem serem piegas, estas histórias cuidadosamente trabalhadas irão aquecer os corações dos leitores.» - School Library Journal<br>', 0, 'Fiction / Romance / Contemporary'),
('tCFdvgAACAAJ', 'Simplesmente Tini', 'Martina Stoessel', '8542204379', '/resources/img/indisponivel.jpg', '/resources/img/capa.png', '''Aqui vocês vão encontrar tudo sobre mim; coisas que sempre tive vontade de escrever para os meus fãs, porque sei que temos uma conexão especial. Minha intenção com esse livro é abrir meu coração para que vocês me conheçam melhor. Muitos vão se lembrar de mim apenas por interpretar Violetta, e sempre será uma honra ter feito esse papel. Mas, sou Martina e adoraria que vocês me conhecessem como realmente sou. Tini. ''Simplesmente Tini''.'' - Martina Stoessel.', 0, ''),
('WCgpyBBBBfIC', 'A bola no ar', 'Edileuza Soares', '8532304613', 'http://books.google.com/books/content?id=WCgpyBBBBfIC&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=WCgpyBBBBfIC&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'O rádio esportivo foi essencial para a transformação do futebol em esporte popular e um importante complemento na definição do rádio como meio de comunicação de massa. A partir das primeiras narrações de jogos de futebol e de entrevistas com veteranos radialistas, a autora nos traz a história do rádio esportivo. De forma criativa e original, ela analisa os diversos estilos de narração e sua evolução até os tempos atuais, desde o primeiro locutor até os astros do momento no radialismo esportivo. Nesse estudo pioneiro, a autora demonstra que o rádio continua um instrumento de comunicação vibrante.', 5, ''),
('wPWnBAAAQBAJ', 'O menino do pijama listrado', 'John Boyne', '8563397117', '/resources/img/indisponivel.jpg', '/resources/img/capa.png', 'Bruno tem nove anos e não sabe nada sobre o Holocausto e a Solução Final contra os judeus. Também não faz idéia que seu país está em guerra com boa parte da Europa, e muito menos que sua família está envolvida no conflito. Na verdade, Bruno sabe apenas que foi obrigado a abandonar a espaçosa casa em que vivia em Berlim e a mudar-se para uma região desolada, onde ele não tem ninguém para brincar nem nada para fazer. Da janela do quarto, Bruno pode ver uma cerca, e para além dela centenas de pessoas de pijama, que sempre o deixam com frio na barriga. Em uma de suas andanças Bruno conhece Shmuel, um garoto do outro lado da cerca que curiosamente nasceu no mesmo dia que ele. Conforme a amizade dos dois se intensifica, Bruno vai aos poucos tentando elucidar o mistério que ronda as atividades de seu pai. O menino do pijama listrado é uma fábula sobre amizade em tempos de guerra, e sobre o que acontece quando a inocência é colocada diante de um monstro terrível e inimaginável.', 0, 'Juvenile Fiction / Historical / Holocaust'),
('Z46cAwAAQBAJ', 'O Teorema Katherine', 'John Green', '9892326342', 'http://books.google.com/books/content?id=Z46cAwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=Z46cAwAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Dezanove foram as vezes que Colin se apaixonou.Das dezanove vezes a rapariga chamava-se Katherine.Não Katie ou Kat, Kittie ou Cathy, e especialmente não Catherine, mas KATHERINE.E das dezanove vezes, levou com os pés. Desde que tinha idade suficiente para se sentir atraído por uma rapariga, Colin, ex-menino prodígio, talvez génio matemático, talvez não, doido por anagramas, saiu com dezanove Katherines. E todas o deixaram. Então ele decide inventar um teorema que prevê o resultado de qualquer relacionamento amoroso. E evitar, se possível, ter o coração novamente destroçado. Tudo isso no curso de um verão glorioso passado com o seu amigo Hassan a descobrir novos lugares, pessoas estranhas de todas as idades e raparigas especiais que têm a grande vantagem de não se chamarem Katherine.John Green é autor de vários bestsellers do New York Times, e de entre os muitos prémios que recebeu destacam-se o Printz Medal, um Printz Honor e o Edgar Award. Foi por duas vezes finalista do LA Times Book Prize.', 4, 'Fiction / Romance / General'),
('ZiE0DwAAQBAJ', 'O Criador da Realidade', 'Bruno J. Gimenes, Patrícia Cân', '8564463261', 'http://books.google.com/books/content?id=ZiE0DwAAQBAJ&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=ZiE0DwAAQBAJ&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Você já possui a vida dos seus sonhos? Consegue materializar suas metas pessoais? Alguém já lhe disse que você é o único responsável pelos resultados que a vida lhe proporciona? Sabia que mesmo as mais difíceis situações, problemas ou crises foi você mesmo quem criou? O Criador da Realidade é uma obra que vai encher sua vida de prosperidade e possibilidades, pois o transformará em um criador consciente da sua realidade. De forma direta e eficiente, oferece todas as informações que você precisa saber para transformar a sua vida em uma história de sucesso, em todos os sentidos: saúde, relacionamentos, dinheiro, paz de espírito, trabalho e muito mais. Você pode pensar: ', 0, 'Self-Help / Spiritual'),
('zSK6FeI5q5kC', 'O melhor de mim', 'Nicholas Sparks', '8580410649', 'http://books.google.com/books/content?id=zSK6FeI5q5kC&printsec=frontcover&img=1&zoom=3&edge=curl&img', 'http://books.google.com/books/content?id=zSK6FeI5q5kC&printsec=frontcover&img=1&zoom=6&edge=curl&img', 'Na primavera de 1984, os estudantes Amanda Collier e Dawson Cole se apaixonaram perdidamente. Embora vivessem em mundos muito diferentes, o amor que sentiam um pelo outro parecia forte o bastante para desafiar todas as convenções de Oriental, a pequena cidade em que moravam. Nascido em uma família de criminosos, o solitário Dawson acreditava que seu sentimento por Amanda lhe daria a força necessária para fugir do destino sombrio que parecia traçado para ele. Ela, uma garota bonita e de família tradicional, que sonhava entrar para uma universidade de renome, via no namorado um porto seguro para toda a sua paixão e seu espírito livre. Infelizmente, quando o verão do último ano de escola chegou ao fim, a realidade os separou de maneira cruel e implacável. Vinte e cinco anos depois, eles estão de volta a Oriental para o velório de Tuck Hostetler, o homem que um dia abrigou Dawson, acobertou o namoro do casal e acabou se tornando o melhor amigo dos dois. Seguindo as instruções de cartas deixadas por Tuck, o casal redescobrirá sentimentos sufocados há décadas. Após tanto tempo afastados, Amanda e Dawson irão perceber que não tiveram a vida que esperavam e que nunca conseguiram esquecer o primeiro amor. Um único fim de semana juntos e talvez seus destinos mudem para sempre. Num romance envolvente, Nicholas Sparks mostra toda a sua habilidade de contador de histórias e reafirma que o amor é a força mais poderosa do Universo – e que, quando duas pessoas se amam, nem a distância nem o tempo podem separá-las.', 5, 'Fiction / Romance / Contemporary, Fiction / Romance / General');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Mensagem`
--

CREATE TABLE IF NOT EXISTS `Mensagem` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `id_to` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `dt_msg` datetime NOT NULL,
  `ds_msg` varchar(250) NOT NULL,
  `cd_conversa` int(11) NOT NULL,
  `ic_msglida` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_msg`,`id_to`,`id_from`),
  UNIQUE KEY `id_msg` (`id_msg`),
  KEY `id_to` (`id_to`,`id_from`),
  KEY `id_from` (`id_from`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Fazendo dump de dados para tabela `Mensagem`
--

INSERT INTO `Mensagem` (`id_msg`, `id_to`, `id_from`, `dt_msg`, `ds_msg`, `cd_conversa`, `ic_msglida`) VALUES
(16, 2038, 2029, '2017-12-08 22:41:22', 'Olá!!', 75, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Premio`
--

CREATE TABLE IF NOT EXISTS `Premio` (
  `id_premio` int(11) NOT NULL,
  `nm_premio` varchar(30) NOT NULL,
  `ds_imagem` varchar(30) NOT NULL,
  `ds_premio` varchar(200) NOT NULL,
  `qt_pontos` int(11) NOT NULL,
  PRIMARY KEY (`id_premio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Premio`
--

INSERT INTO `Premio` (`id_premio`, `nm_premio`, `ds_imagem`, `ds_premio`, `qt_pontos`) VALUES
(0, 'Apoio para livros - Ajuda aí', 'apoio-homem.jpg', 'Apoio para segurar seus livros no lugar', 2000),
(1, 'Apoio para livros - LOVE', 'apoio-love.jpg', 'Lindo apoio para apaixonados por livros', 2200),
(3, 'Apoio para livros - Star wars', 'apoio-star-wars.jpg', 'Aquele enfeite pra quem ama Star wars', 2600),
(4, 'Colar livro', 'colar-livro.jpg', 'Mostre para todo mundo seu amor por leitura', 600),
(5, 'Desconto 15% na Saraiva', 'desconto-saraiva.jpg', 'Vai perder esse descontão?', 1000),
(6, 'Estante para livros', 'estante.jpg', 'Precisando de um canto para seus livros?', 6000),
(7, 'Kindle', 'kindle.jpg', 'Leitura mais facilitada para seus livros', 8000),
(8, 'Luminária', 'luminaria.jpg', 'Para quem quer dar uma luz à leitura', 3000),
(9, 'Marcador - Corujinha', 'marcador-coruja.jpg', 'Não perca mais a página em que parou', 70),
(10, 'Marcador - História', 'marcador-historia.jpg', 'Marque sua história com essa belezura', 80),
(11, 'Marcador de linha', 'marcador-linha.jpg', 'Prático, fácil e bonito', 50),
(12, 'Marcadores - Monstrinho', 'marcador-monstro.jpg', 'Lindo kit de marcadores com monstrinhos fofos', 120),
(13, 'Marcador - Unicórnio', 'marcador-unicornio.jpg', 'Para loucos por unicórnios', 60);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Solicitacao`
--

CREATE TABLE IF NOT EXISTS `Solicitacao` (
  `id_transacao` int(11) NOT NULL AUTO_INCREMENT,
  `cd_solicitado` int(11) NOT NULL,
  `cd_solicitante` int(11) NOT NULL,
  `cd_livrosolicitado` varchar(20) NOT NULL,
  `cd_livrooferecido` varchar(20) NOT NULL,
  `dt_transacao` date NOT NULL,
  `cd_tipo` int(11) NOT NULL,
  `qt_tempo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_transacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Fazendo dump de dados para tabela `Solicitacao`
--

INSERT INTO `Solicitacao` (`id_transacao`, `cd_solicitado`, `cd_solicitante`, `cd_livrosolicitado`, `cd_livrooferecido`, `dt_transacao`, `cd_tipo`, `qt_tempo`) VALUES
(45, 2029, 2038, 'k7SlDQAAQBAJ', '', '2017-12-08', 3, '1 mês');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Transacoes`
--

CREATE TABLE IF NOT EXISTS `Transacoes` (
  `cd_usuario` int(11) NOT NULL,
  `qt_doa` int(11) NOT NULL,
  `qt_emp` int(11) NOT NULL,
  `qt_troca` int(11) NOT NULL,
  PRIMARY KEY (`cd_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Transacoes`
--

INSERT INTO `Transacoes` (`cd_usuario`, `qt_doa`, `qt_emp`, `qt_troca`) VALUES
(2029, 3, 9, 7),
(2038, 0, 0, 0),
(2039, 0, 0, 0),
(2040, 0, 0, 0),
(2041, 0, 0, 0),
(2042, 0, 0, 0),
(2043, 0, 0, 0),
(2044, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `cd_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `ds_email` varchar(30) NOT NULL,
  `ds_senha` varchar(512) NOT NULL,
  `cd_cpf` varchar(11) NOT NULL,
  `nm_usuario` varchar(45) NOT NULL,
  `ds_foto` longtext,
  `ds_usuario` varchar(300) DEFAULT NULL,
  `nm_cidade` varchar(20) NOT NULL,
  `nm_estado` varchar(20) NOT NULL,
  `ds_interesses` varchar(200) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `qt_pontos` int(11) NOT NULL,
  PRIMARY KEY (`cd_usuario`,`ds_email`,`ds_senha`),
  UNIQUE KEY `ds_email` (`ds_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2045 ;

--
-- Fazendo dump de dados para tabela `Usuario`
--

INSERT INTO `Usuario` (`cd_usuario`, `ds_email`, `ds_senha`, `cd_cpf`, `nm_usuario`, `ds_foto`, `ds_usuario`, `nm_cidade`, `nm_estado`, `ds_interesses`, `dt_nascimento`, `qt_pontos`) VALUES
(2029, 'brendacenzi@hotmail.com', '04db166db7940f0f83113c850373b414f3a9ec4c', '45086221862', 'Brenda Cenzi', 'aIQTLdwC.jpg', 'Apaixonada por tecnologia, leitura, temaki e star wars... Gosto muito de livros de ficção científica', 'Guarujá', 'São Paulo', 'Aventura;Científico;Drama;Fantasia;Ficção científica;Terror', '1997-11-04', 1995),
(2038, 'stephany.tenorio@gmail.com', 'e85dde8514742457a793e07686ff875c1ace27d7', '4508622186', 'Stephany Tenorio', 'bzwQNnBy.jpg', 'Influenciadora digital e a maior blogueirinha que você respeita', 'Acari', 'Rio Grande do Norte', 'Didático;Drama;Terror', '1997-11-04', 0),
(2039, 'maurilynlima@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '12345678', 'Maurilyn Lima', 'oZUtKykC.jpg', 'ama livros', 'Adamantina', 'São Paulo', 'Aventura;Ficção científica', '1982-10-11', 0),
(2040, 'bren@seila.com', '04db166db7940f0f83113c850373b414f3a9ec4c', '45086223545', 'brenda', 'NHxvIFSm.jpg', 'gfghf', 'Angra dos Reis', 'Rio de Janeiro', 'Didático;Ficção científica;Infantil', '2018-12-31', 0),
(2041, 'brenda@gmail.com', '04db166db7940f0f83113c850373b414f3a9ec4c', '4984654654', 'uierjhfoi', 'nmGtWMou.jpg', 'sfdkçpskdfpas', 'Álvares Machado', 'São Paulo', 'Didático;Drama;Infantil', '1997-04-05', 0),
(2042, 'stephany.tesouza@gmail.com', '6e1e31b4c54649a4b89a602b78d74c75dd9d61dc', '44701205885', 'stephany', 'CuVNJaGk.jpg', 'amante da leitura ', 'Guarujá', 'São Paulo', 'Aventura;Biografia;Didático', '1996-11-13', 0),
(2043, 'maurilyn@gmail.com', 'f5d44204ad8783373b90603239dff363aaa386b9', '30419152865', 'Maurilyn', 'FoIzuXyG.jpg', '', 'Guarujá', 'São Paulo', 'Aventura', '1982-10-11', 0),
(2044, 'leticia@hotmail.com', 'e205888b17f2f470c1ef12d55acef94e5b52289d', '45086221862', 'Leticia', 'dIvPBpcL.jpg', 'sdijsdfjsdijfifijjiejiw', 'Avelino Lopes', 'Piauí', 'Didático;Drama;Fantasia;Infantil', '1997-11-04', 0);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Estante`
--
ALTER TABLE `Estante`
  ADD CONSTRAINT `Estante_ibfk_1` FOREIGN KEY (`cd_usuario`) REFERENCES `Usuario` (`cd_usuario`),
  ADD CONSTRAINT `Estante_ibfk_2` FOREIGN KEY (`cd_livro`) REFERENCES `Livro` (`cd_livro`);

--
-- Restrições para tabelas `Mensagem`
--
ALTER TABLE `Mensagem`
  ADD CONSTRAINT `Mensagem_ibfk_1` FOREIGN KEY (`id_to`) REFERENCES `Usuario` (`cd_usuario`),
  ADD CONSTRAINT `Mensagem_ibfk_2` FOREIGN KEY (`id_from`) REFERENCES `Usuario` (`cd_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
