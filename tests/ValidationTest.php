<?php
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    public function testValidateArticleInputSuccess()
    {
        $input = [
            'title' => 'Test Title',
            'author' => 'Test Author',
            'content' => 'Test Content'
        ];
        $this->assertTrue(validateArticleInput($input));
    }

    public function testValidateArticleInputMissingTitle()
    {
        $input = [
            'author' => 'Test Author',
            'content' => 'Test Content'
        ];
        $this->assertEquals("Il manque le titre de l'article", validateArticleInput($input));
    }

    public function testValidateArticleInputMissingAuthor()
    {
        $input = [
            'title' => 'Test Title',
            'content' => 'Test Content'
        ];
        $this->assertEquals("Il manque le nom de l'auteur de l'article", validateArticleInput($input));
    }

    public function testValidateArticleInputMissingContent()
    {
        $input = [
            'title' => 'Test Title',
            'author' => 'Test Author'
        ];
        $this->assertEquals("Il manque le contenu de l'article", validateArticleInput($input));
    }

    public function testValidateArticleInputEmptyStrings()
    {
        $input = [
            'title' => '',
            'author' => 'Test Author',
            'content' => 'Test Content'
        ];
        $this->assertEquals("Il manque le titre de l'article", validateArticleInput($input));
    }
}
