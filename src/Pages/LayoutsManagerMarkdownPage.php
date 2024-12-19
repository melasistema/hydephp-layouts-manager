<?php

declare(strict_types=1);

namespace Melasistema\HydeLayoutsManager\Pages;

use Hyde\Pages\Concerns\BaseMarkdownPage;
use Melasistema\HydeLayoutsManager\Layouts\LayoutManager;
use Hyde\Markdown\Models\Markdown;

class LayoutsManagerMarkdownPage extends BaseMarkdownPage
{
    protected LayoutManager $layoutManager;

    public function __construct(string $identifier = '', $matter = [], $markdown = '')
    {
        parent::__construct($identifier, $matter, $markdown);

        // You can inject the LayoutManager directly
        $this->layoutManager = app(LayoutManager::class);
    }

    public function markdown(): Markdown
    {
        // Perform custom post-processing on the markdown body
        $this->markdown->body = $this->layoutManager->parseComponents($this->markdown->body);

        return $this->markdown;
    }

    public function compile(): string
    {
        return parent::compile();
    }
}
