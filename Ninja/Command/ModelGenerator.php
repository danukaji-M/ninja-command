<?php

namespace Ninja\Command;

class ModelGenerator
{
    public function generate($modelName)
    {
        $currentYear = date('Y');
        $currentDateTime = date('Y-m-d H:i:s');

        $template = <<<EOD
<?php

namespace App\Entity;

/**
 * Class $modelName
 * 
 * Generated on $currentDateTime
 * © $currentYear Ninja-Web Framework
 */
class $modelName
{
    // Model logic here
}
EOD;

        $directory = __DIR__ . '/../../app/Models';

        // Ensure the directory exists
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filePath = "$directory/$modelName.php";

        // Check if the file already exists
        if (file_exists($filePath)) {
            echo "The file '$modelName.php' already exists! Skipping creation.\n";
            return;
        }

        // Create the file
        file_put_contents($filePath, $template);
        echo "The file '$modelName.php' has been created successfully!\n";
    }
}
