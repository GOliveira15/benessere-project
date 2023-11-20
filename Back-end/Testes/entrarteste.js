// Importe as funções ou bibliotecas necessárias
const { JSDOM } = require('jsdom');
const fs = require('fs');

// Função para ler o conteúdo do arquivo HTML
function loadHTMLFile(filePath) {
  const fileContent = fs.readFileSync(filePath, 'utf-8');
  const dom = new JSDOM(fileContent);
  return dom.window.document;
}

// Teste unitário
test('Formulário contém elementos necessários', () => {
  // Carregue o conteúdo do arquivo HTML
  const document = loadHTMLFile('caminho/do/seu/arquivo.html');

  // Verifique a existência dos elementos no formulário
  expect(document.querySelector('.form-signin')).toBeTruthy();
  expect(document.querySelector('#inputEmail')).toBeTruthy();
  expect(document.querySelector('#inputPassword')).toBeTruthy();
  expect(document.querySelector('button[type="submit"]')).toBeTruthy();
  expect(document.querySelector('a[href="../Funcionario/funcionario.html"]')).toBeTruthy();
  expect(document.querySelector('.text-center a[href="../index.html"]')).toBeTruthy();
  expect(document.querySelector('p.text-muted')).toBeTruthy();
});