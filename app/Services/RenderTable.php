<?php

namespace App\Services;

class RenderTable
{
    public function renderTable(array $data, $config): string
    {
        $getters = array_filter(get_class_methods($data[0]), function($method) {
            return 'get' === substr($method, 0, 3);
        });        

        $table = '<table class="table table-striped table-hover">';
        $table .= '<thead class="thead-dark">';
        $table .= '<tr>';
        foreach ($getters as $getter) {      
            $table .= '<th>' . str_replace('get','',$getter) . '</th>';
        }
        $table .= '</tr>';
        $table .= '</thead>';
        $table .= '<tbody>';
        foreach ($data as $item) {
            $table .= '<tr>';
            foreach ($getters as $getter) {
                if(in_array(strtolower(str_replace('get','',$getter)),$config['cols'])) {        
                    $table .= '<td>' . $item->$getter() . '</td>';
                }
            }
            $table .= '</tr>';
        }
        $table .= '</tbody>';
        $table .= '</table>';
        return $table;
    }
}