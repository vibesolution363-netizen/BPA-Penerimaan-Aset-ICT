<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Format: [ID, Device, Adapter, DVD, Dongle, Keyboard, Mouse, Monitor, UPS]
        // Data extracted from: "List Penerima Komputer Riba, AiO Dan Komputer Peribadi.xlsx"
        $assets = [
            [1, '6KJS0D4', null, '518-01HD-A09', null, '57F-K0XJ-A00', null, null, 'EL4325601596'],
            [2, '32KS0D4', null, '518-01HE-A09', null, '57F-K0XE-A00', null, null, 'EL4325601665'],
            [3, '2KJS0D4', null, '518-01HG-A09', null, '57F-K0XL-A00', null, null, 'EL4325601666'],
            [4, '6LJS0D4', null, '518-01HF-A09', null, '57F-K0WY-A00', null, null, 'EL4325601667'],
            [5, 'BKJS0D4', null, '518-01HH-A09', null, '57F-K0WX-A00', null, null, 'EL4325601668'],
            [6, 'HKJS0D4', null, '518-01HI-A09', null, '57F-K0XK-A00', null, null, 'EL4325601617'],
            [7, '42KS0D4', null, '518-01HL-A09', null, '57F-K0X9-A00', null, null, 'EL4325601618'],
            [8, '7KJS0D4', null, '518-01HK-A09', null, '57F-K0X2-A00', null, null, 'EL4325601619'],
            [9, 'GJJS0D4', null, '518-01HJ-A09', null, '57F-K0WS-A00', null, null, 'EL4325601620'],
            [10, '9KJS0D4', null, '518-01HM-A09', null, '57F-K0WT-A00', null, null, 'EL4325601633'],
            [11, '4KJS0D4', null, '518-01J0-A09', null, '57F-K0WW-A00', null, null, 'EL4325601634'],
            [12, 'CKJS0D4', null, '518-01IZ-A09', null, '57F-K0X0-A00', null, null, 'EL4325601635'],
            [13, '1KJS0D4', null, '518-01IY-A09', null, '57F-K0WV-A00', null, null, 'EL4325601636'],
            [14, '6GWZ0D4', '58G-3C6Q-A02', null, '599-0024-A05', null, 'CN-08GNRT-PRC00-588-00JO', null, null],
            [15, 'BJWZ0D4', '58G-32LP-A02', null, '599-000X-A05', null, 'CN-08GNRT-PRC00-588-00JW', null, null],
            [16, 'JHWZ0D4', '58G-32KZ-A02', null, '596-00FQ-A05', null, 'CN-08GNRT-PRC00-588-00JU', null, null],
            [17, 'CHWZ0D4', '58G-32OO-A02', null, '599-000V-A05', null, 'CN-08GNRT-PRC00-588-00JV', null, null],
            [18, 'GGWZ0D4', '58G-32CH-A04', null, '596-00NP-A05', null, 'CN-08GNRT-PRC00-588-00JT', null, null],
            [19, '2HWZ0D4', '58G-32LL-A02', null, '599-001S-A05', null, 'CN-08GNRT-PRC00-588-00JY', null, null],
            [20, '3GWZ0D4', '58G-3C7C-A02', null, '596-00F8-A05', null, 'CN-08GNRT-PRC00-588-00JZ', null, null],
            [21, 'DFWZ0D4', '58G-3C7F-A02', null, '599-001N-A05', null, 'CN-08GNRT-PRC00-588-00KO', null, null],
            [22, '8JWZ0D4', '58G-32LI-A02', null, '599-003X-A05', null, 'CN-08GNRT-PRC00-588-00K1', null, null],
            [23, '9HWZ0D4', '58G-32LF-A02', null, '599-00AZ-A05', null, 'CN-08GNRT-PRC00-588-00K2', null, null],
            [24, 'FHWZ0D4', '58G-32KY-A02', null, '598-00HJ-A05', null, 'CN-08GNRT-PRC00-588-00JJ', null, null],
            [25, 'GFWZ0D4', '58G-3C6U-A02', null, '598-009L-A05', null, 'CN-08GNRT-PRC00-588-00JK', null, null],
            [26, 'DHWZ0D4', '58G-3C88-A02', null, '599-001Z-A05', null, 'CN-08GNRT-PRC00-588-00JL', null, null],
            [27, 'CGWZ0D4', '58G-3C6V-A02', null, '598-00AF-A05', null, 'CN-08GNRT-PRC00-588-00JM', null, null],
            [28, '3HWZ0D4', '58G-325C-A02', null, '598-00CD-A05', null, 'CN-08GNRT-PRC00-588-00JS', null, null],
            [29, '6HWZ0D4', '58G-32L6-A02', null, '599-0008-A05', null, 'CN-08GNRT-PRC00-588-00JN', null, null],
            [30, '5JWZ0D4', '58G-32LC-A02', null, '599-000G-A05', null, 'CN-08GNRT-PRC00-588-00JR', null, null],
            [31, 'CJWZ0D4', '58G-32CU-A02', null, '598-00F0-A05', null, 'CN-08GNRT-PRC00-588-00JQ', null, null],
            [32, '5GWZ0D4', '58G-3C6R-A02', null, '599-0068-A05', null, 'CN-08GNRT-PRC00-588-00JX', null, null],
            [33, '9GWZ0D4', '58G-325L-A02', null, '599-00AU-A05', null, 'CN-08GNRT-PRC00-588-00JP', null, null],
            [34, '9JWZ0D4', '58G-32LH-A02', null, '599-000D-A05', null, 'CN-08GNRT-PRC00-588-00O7', null, null],
            [35, 'FGWZ0D4', '58G-32CR-A02', null, '598-00FH-A05', null, 'CN-08GNRT-PRC00-588-00O6', null, null],
            [36, '2JWZ0D4', '58G-32V4-A02', null, '599-000Y-A05', null, 'CN-08GNRT-PRC00-588-00OA', null, null],
            [37, 'FJWZ0D4', '58G-32CN-A02', null, '599-004A-A05', null, 'CN-08GNRT-PRC00-588-00OG', null, null],
            [38, 'HFWZ0D4', '58G-3CE6-A02', null, '599-001Y-A05', null, 'CN-08GNRT-PRC00-588-00OF', null, null],
            [39, '2GWZ0D4', '58G-3C6H-A02', null, '599-007R-A05', null, 'CN-08GNRT-PRC00-588-00O9', null, null],
            [40, 'HLWZ0D4', '58G-3CE3-A02', null, '599-0011-A05', null, 'CN-08GNRT-PRC00-588-00O4', null, null],
            [41, '6JWZ0D4', '58G-32LQ-A02', null, '598-00QE-A05', null, 'CN-08GNRT-PRC00-588-00OC', null, null],
            [42, '1GWZ0D4', '58G-3C6Y-A02', null, '598-00F9-A05', null, 'CN-08GNRT-PRC00-588-00OB', null, null],
            [43, '7HWZ0D4', '58G-32L7-A02', null, '596-00GP-A05', null, 'CN-08GNRT-PRC00-588-00OE', null, null],
            [44, 'HHWZ0D4', '58G-32L3-A02', null, '599-00AT-A05', null, 'CN-08GNRT-PRC00-588-00O1', null, null],
            [45, 'BGWZ0D4', '58G-3CE5-A02', null, '599-001E-A05', null, 'CN-08GNRT-PRC00-588-00O0', null, null],
            [46, 'FLWZ0D4', '58G-3CBV-A02', null, '598-00RH-A05', null, 'CN-08GNRT-PRC00-588-00LX', null, null],
            [47, 'JFWZ0D4', '58G-3C70-A02', null, '599-000H-A05', null, 'CN-08GNRT-PRC00-588-00NZ', null, null],
            [48, '8GWZ0D4', '58G-3C6T-A02', null, '599-000Q-A05', null, 'CN-08GNRT-PRC00-588-00OH', null, null],
            [49, '4HWZ0D4', '58G-325K-A02', null, '598-00HG-A05', null, 'CN-08GNRT-PRC00-588-00OI', null, null],
            [50, '3JWZ0D4', '58G-32LK-A02', null, '598-00BJ-A05', null, 'CN-08GNRT-PRC00-588-00O8', null, null],
            [51, '8HWZ0D4', '58G-32V5-A02', null, '598-00F5-A05', null, 'CN-08GNRT-PRC00-588-00O3', null, null],
            [52, 'HGWZ0D4', '58G-3C6N-A02', null, '598-00SH-A05', null, 'CN-08GNRT-PRC00-588-00O2', null, null],
            [53, 'GLWZ0D4', '58G-3C74-A02', null, '598-008B-A05', null, 'CN-08GNRT-PRC00-588-00O5', null, null],
            [54, '1HWZ0D4', '58G-3CEA-A02', null, '598-00NV-A05', null, 'CN-08GNRT-PRC00-588-00OD', null, null],
            [55, 'JGWZ0D4', '58G-3C6L-A02', null, '599-000W-A05', null, 'CN-08GNRT-PRC00-588-00M7', null, null],
            [56, '5HWZ0D4', '58G-32KV-A02', null, '596-00EI-A05', null, 'CN-08GNRT-PRC00-588-00LW', null, null],
            [57, '4GWZ0D4', '58G-3C87-A02', null, '598-00CG-A05', null, 'CN-08GNRT-PRC00-588-00M0', null, null],
            [58, 'DJWZ0D4', '58G-32CO-A02', null, '598-00C6-A05', null, 'CN-08GNRT-PRC00-588-00TB', null, null],
            [59, '4JWZ0D4', '58G-32L5-A02', null, '598-009G-A05', null, 'CN-08GNRT-PRC00-588-00TE', null, null],
            [60, 'DGWZ0D4', '58G-32CG-A02', null, '596-00DA-A05', null, 'CN-08GNRT-PRC00-588-00T1', null, null],
            [61, '7JWZ0D4', '58G-32LV-A02', null, '596-00DC-A05', null, 'CN-08GNRT-PRC00-588-00T9', null, null],
            [62, 'BHWZ0D4', '58G-32L4-A02', null, '599-002A-A05', null, 'CN-08GNRT-PRC00-588-00TA', null, null],
            [63, '7GWZ0D4', '58G-3C6X-A02', null, '599-000S-A05', null, 'CN-08GNRT-PRC00-588-00T0', null, null],
            [64, 'FFWZ0D4', '58G-3C71-A02', null, '599-0015-A05', null, 'CN-08GNRT-PRC00-588-00LZ', null, null],
            [65, 'GHWZ0D4', '58G-32D0-A02', null, '598-00R6-A05', null, 'CN-08GNRT-PRC00-588-00LY', null, null],
            [66, '1JWZ0D4', '58R-32CX-A02', null, '598-00SO-A05', null, 'CN-08GNRT-PRC00-588-00SZ', null, null],
            [67, '7LJS0D4', '57P-02ZY-A03', '518-01IX-A09', null, '57F-K0WZ-A00', null, null, 'EL4325601601'],
            [68, 'DKJS0D4', '57P-03MB-A03', '518-01IW-A09', null, '57F-K0X5-A00', null, null, 'EL4325601602'],
            [69, 'JKJS0D4', '57P-01F3-A03', '518-01IV-A09', null, '57F-K0X6-A00', null, null, 'EL4325601603'],
            [70, '8LJS0D4', '57P-02ZG-A03', '518-01IU-A09', null, '57F-K0X4-A00', null, null, 'EL4325601604'],
            [71, '1LJS0D4', '57P-03M7-A03', '518-01IT-A09', null, '57F-K0X8-A00', null, null, 'EL4325601605'],
            [72, '6MJS0D4', '57P-03M8-A03', '518-01IS-A09', null, '57F-K0X7-A00', null, null, 'EL4325601606'],
            [73, '5LJS0D4', '57P-03MA-A03', '518-01IR-A09', null, '57F-K0XB-A00', null, null, 'EL4325601607'],
            [74, 'GLJS0D4', '57P-03M9-A03', '518-01JP-A09', null, '57F-K0X1-A00', null, null, 'EL4325601608'],
            [75, '5MJS0D4', '57P-03Q9-A03', '518-01JR-A09', null, '57F-K0XA-A00', null, null, 'EL4325601589'],
            [76, '52KS0D4', '57P-038W-A03', '518-01JS-A09', null, '57F-K0X3-A00', null, null, 'EL4325601590'],
            [77, 'G5FS0D4', null, null, null, '56R-K04L-A00', null, 'HKNLR94', 'EL4325601588'],
            [78, '3LJS0D4', null, null, null, '56R-K08F-A00', null, 'CNY5RB4', 'EL4325601592'],
            [79, 'GKJS0D4', null, null, null, '56R-K06Y-A00', null, 'F67BRB4', 'EL4325601585'],
            [80, '5KJS0D4', null, null, null, '56R-K08C-A00', null, 'F66BRB4', 'EL4325601586'],
            [81, '2LJS0D4', null, null, null, '56R-K089-A00', null, 'F78BRB4', 'EL4325601585'],
            [82, '9LJS0D4', null, null, null, '56R-KO72-A00', null, 'F65BRB4', 'EL4325601591'],
        ];

        foreach ($assets as $row) {
            DB::table('assets')->where('id', $row[0])->update([
                'siri_device' => $row[1],
                'siri_adapter' => $row[2],
                'siri_dvd_drive' => $row[3],
                'siri_dongle' => $row[4],
                'siri_keyboard' => $row[5],
                'siri_mouse' => $row[6],
                'siri_monitor' => $row[7],
                'siri_ups' => $row[8],
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Aset dikemaskini dengan berjaya!');
    }
}