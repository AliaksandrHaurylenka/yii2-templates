<?php

use yii\db\Migration;

/**
 * Handles the creation of table `grid_view`.
 */
class m170718_120800_create_grid_view_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('grid_view', [
            'id' => $this->primaryKey(),
            'type' => $this->string(5)->notNull(),
            'venchik' => $this->string(10)->notNull(),
            'venchik_en' => $this->string(10)->notNull(),
            'volume' => $this->integer()->notNull()->defaultValue(5),
            'number' => $this->integer()->notNull()->defaultValue(3),
            'height' => $this->float()->notNull(),
            'dev_1' => $this->string(5)->notNull(),
            'diameter' => $this->float()->notNull(),
            'dev_2' => $this->string(5)->notNull(),
            'name_1' => $this->string(30)->notNull(),
            'name_2' => $this->string(30)->notNull(),
            'full_naliv' => $this->integer()->notNull()->defaultValue(5),
            'dev_naliv' => $this->string(5)->notNull(),
            'massa' => $this->integer()->notNull()->defaultValue(4),
            'dev_massa' => $this->string(5)->notNull(),
            'status' => $this->string(10)->notNull(),
        ]);

        /**
        * Занесение данных сразу в таблицу
        * 'grid_view' - имя таблицы
        * далее массив имен столбцов
        * далее перечисление данных в столбцах
        */
        $this->batchInsert('grid_view', 
            [
                'type', 'venchik', 'venchik_en', 'volume', 'number', 
                'height', 'dev_1', 
                'diameter', 'dev_2', 'name_1', 'name_2', 
                'full_naliv', 'dev_naliv', 
                'massa', 'dev_massa', 'status'
            ],
            
            [
                ['X', 'ВКП', 'vkp', 500, 1, 264, '±1.7', 68.3, '±1.4', 'DESANT twist', 'desant-twist', 520, '±10', 340, '±15', 'old'],
                ['X', 'КПНв', 'kpnv', 500, 23, 242, '±1.3', 69, '±1.3', 'BSP', 'bbh-low', 520, '±10', 340, '±15', 'old'],
                ['X', 'ВКП-1', 'vkp', 500, 4, 267.5, '±1.7', 66.6, '±1.3', 'Криница', 'krinitsa', 520, '±10', 345, '±15', 'archive'],
                ['X', 'ВКП-2', 'vkp', 500, 15, 258, '±1.7', 68.1, '±1.4', 'Златы Базант', 'zlatBaz', 525, '±10', 330, '±15', 'archive'],
                ['X', 'ВКП', 'vkp', 500, 2, 257, '±1.7', 68.6, '±1.4', 'ZIP', 'zip', 516, '±10', 340, '±10', 'archive'],
                ['X', 'КПНн', 'kpnn', 500, 5, 257.5, '±1.7', 69, '±1.4', 'ALIVARIA 1864', 'alivaria1864', 542, '±10', 340, '±15', 'old'],
                ['X', 'ВКП', 'vkp', 500, 3, 260, '±1.7', 68.1, '±1.4', 'MPK twist', 'mpk-twist', 524, '±7', 340, '±10', 'archive'],
                ['X', 'КПНн', 'kpnn', 500, 6, 251, '±1.6', 68, '±1.3', 'Кальтенберг', 'kaltenberg', 520, '±10', 345, '±15', 'archive'],
                ['X', 'КПНв', 'kpnv', 500, 8, 260, '±1.6', 68.5, '±1.3', 'New ALIVARIA', 'new-alivaria', 520, '±10', 340, '±10', 'old'],
                ['X', 'КПНн', 'kpnn', 568, 9, 282, '±1.8', 67.6, '±1.4', 'Pinta', 'pinta', 588, '±10', 360, '±15', 'old'],
                ['X', 'КПНв', 'kpnv', 500, 10, 268, '±1.3', 69, '±1.4', 'Special', 'special', 517, '±10', 345, '±15', 'old'],
                ['X', 'КПНв', 'kpnv', 500, 11, 260, '±1.7', 68.1, '±1.4', 'MPK', 'mpk', 524, '±7', 340, '±10', 'archive'],
                ['X', 'КПНв', 'kpnv', 500, 12, 270, '±1.7', 68.3, '±1.4', 'LONG-NECK', 'long-neck', 520, '±10', 375, '±15', 'old'],
                ['X', 'КПНв', 'kpnv', 500, 13, 249, '±1.7', 68.7, '±1.3', 'BBH', 'bbh', 517, '±7', 345, '±10', 'archive'],
                ['X', 'КПНв', 'kpnv', 500, 14, 260, '±1.7', 66.9, '±1.4', 'NRW', 'nrw', 520, '±10', 340, '±15', 'old'],
                ['X', 'ВКП-2', 'vkp', 500, 16, 258, '±1.7', 70.9, '±1.4', 'Хмель', 'bobr', 520, '±10', 330, '±15', 'archive'],
                ['X', 'ВКП', 'vkp', 500, 17, 260, '±1.7', 66.9, '±1.4', 'NRW twist', 'nrw-twist', 520, '±10', 340, '±15', 'old'],
                ['X', 'КПНв', 'kpnv', 500, 18, 264, '±1.7', 68.3, '±1.4', 'DESANT', 'desant', 520, '±10', 340, '±15', 'old'],
                ['X', 'ВКП', 'vkp', 500, 19, 268, '±1.7', 69, '±1.4', 'PREMIUM twist', 'premium-twist', 520, '±10', 375, '±15', 'archive'],
                ['X', 'КПНв', 'kpnv', 500, 20, 228, '±1.6', 70.5, '±1.4', 'EURO', 'euro', 520, '±7', 340, '±10', 'archive'],
                ['X', 'КПНн', 'kpnn', 500, 22, 246.5, '±1.6', 70.5, '±1.4', 'Amber', 'amber', 520, '±10', 340, '±15', 'old'],
                ['X', 'КПНв', 'kpnv', 500, 24, 242, '±1.6', 70.3, '±1.3', 'Жигулевское пиво', 'ziguli', 520, '±10', 345, '±10', 'old'],
                ['X', 'КПНв', 'kpnv', 330, 27, 174, '±1.3', 69.5, '±1.4', 'Barrel 330', 'barrel-330', 345, '±10', 275, '±10', 'archive'],
                ['X', 'КПНн', 'kpnn', 330, 25, 234.2, '±1.5', 60.3, '±1.2', 'LIDA', 'lida330', 350, '±7', 260, '+15', 'old'],
                ['X', 'ВКП', 'vkp', 500, 26, 269.6, '±1.6', 68.7, '±1.3', 'Classic twist', 'classic-twist', 525, '±10', 350, '±10', 'old'],
                ['X', 'ВКП-1', 'vkp', 500, 30, 264, '±1.7', 68.3, '±1.4', 'LONG-NECK twist', 'long-neck-twist', 520, '±10', 375, '±10', 'old'],
                ['X', 'КПНв', 'kpnv', 500, 7, 242, '±1.5', 69.5, '±1.4', 'Варшава', 'varshava', 520, '±10', 345, '±10', 'old'],
                ['X', 'КПНн', 'kpnn', 500, 35, 246.5, '±1.6', 70.5, '±1.4', 'AMBER PIWO', 'amber-piwo', 520, '±10', 340, '±15', 'archive'],
                ['X', 'К', 'other', 700, 33, 280, '±1.7', 74.1, '±1.4', 'GRAPE', 'grape-700', 725, '±15', 420, '±15', 'old'],
                ['XVIII', 'Ш', 'other', 750, 50, 300, '±1.8', 83, '±1.5', 'Шампань', 'shampan', 785, '±15', 645, '±10', 'old'],
                ['X', 'КПНн', 'kpnn', 500, 15, 258, '±1.7', 68.1, '±1.4', 'Златы Базант КПНн', 'zlat-baz', 525, '±10', 330, '±15', 'old'],
                ['X', 'КПНн', 'kpnn', 500, 16, 258, '±1.7', 70.9, '±1.4', 'Хмель КПНн', 'hops', 522, '±10', 330, '±15', 'old'],
                ['X', 'В-28-1', 'other', 700, 37, 281, '±2.0', 74.1, '±1.4', 'GRAPE twist', 'grape-700-twist', 725, '±15', 420, '±15', 'old'],
                ['X', 'В-28-1', 'other', 500, 36, 262.5, '±2', 68.3, '±1.4', 'DESANT wine', 'desant-wine', 520, '±10', 340, '±15', 'new'],
                ['X', 'КПНв', 'kpnv', 500, 29, 270, '±1.7', 68.3, '±1.4', 'LONG-NECK ALIVA', 'long-neck-aliva', 519, '±7', 355, '±10', 'new'],
                ['X', 'П-29-А', 'other', 750, 40, 312, '±1.8', 74, '±1.4', 'Бордо А', 'bordo-A', 775, '±10', 460, '±15', 'new'],
                ['X', 'П-29-Б', 'other', 750, 39, 310, '±1.8', 74, '±1.4', 'Бордо Б', 'bordo-B', 775, '±10', 460, '±15', 'new'],
                ['X', 'КПНв', 'kpnv', 500, 31, 242, '±1.6', 70.7, '±1.4', 'KULT', 'kult', 520, '±10', 340, '±10', 'new']
            ]);
    }



    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('grid_view');
    }
}
