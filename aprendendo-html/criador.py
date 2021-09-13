from gtts import gTTS

# Um simples conversor texto-voz feito em python

texto = 'O que é HTML? HTML; Linguagem de Marcação de HiperTexto; é o que estrutura o conteúdo de uma página através de marcadores. O que são Tegs? São exatamente esses marcadores! Existem inúmeros marcadores para deixar o seu conteúdo o mais estruturado e organizado possível. O HTML 5 nos ajudou nessa missão, trazendo muitas tegs novas! Temos tegs para botões, formulários, imagens, tabelas, textos, entre outras.'



voz = gTTS(texto, lang="pt-br").save('explicacao.mp3')