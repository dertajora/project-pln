@extends('layout.user')

@section('aktif1')
class="active"
@endsection
@section('content')

 <!-- START CUSTOM TABS -->
          
            <div>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-book"></i>&nbsp Peraturan Menteri Tarif Penerangan Lampu</a></li>
                  <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-lightbulb-o"></i>&nbsp Jenis Lampu</a></li>
                  <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-flash"></i> &nbsp Kelas Lampu</a></li>
                  <li><a href="#tab_4" data-toggle="tab"><i class="fa fa-dollar"></i> &nbsp Tarif</a></li>
                  
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <section class="content-header">
                    <h4>Peraturan Menteri Energi dan Sumber Daya Mineral Republik Indonesia Nomor 31 Tahun 2014
                    Tentang “TARIF TENAGA LISTRIK YANG DISEDIAKAN OLEH PERUSAHAAN PERSEROAN (PERSERO) PT PERUSAHAAN LISTRIK NEGARA” dimana:
                    </h4><br>

                    <blockquote>
                    <p>Golongan tarif untuk keperluan penerangan jalan umum pada tegangan rendah (P-3/TR).</p>
                    <small>Pasal 3 huruf e angka 4</small>
                    </blockquote>

                    <blockquote>
                    <p>Golongan tarif untuk keperluan penerangan jalan umum pada tegangan rendah, (P3-TR) </p>
                    <small>Pasal 5 ayat (1)</small>
                  </blockquote>
                    </section>
                   
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  <section class="content-header">
                      
                  <div class="box-header with-border">
                    <h3 class="box-title">JENIS LAMPU</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered">
                      <tr>
                        <th style="width: 10px">No</th>
                        
                        <th>Jenis</th>
                        <th>Tipe</th>
                       
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>MERCURY</td>
                        <td>PELEPAS GAS</td>
                       
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>SOROT</td>
                        <td>PELEPAS GAS</td>
                       
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>TL</td>
                        <td>PELEPAS GAS</td>
                       
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>ML</td>
                        <td>PELEPAS GAS</td>
                       
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>SODIUM</td>
                        <td>PELEPAS GAS</td>
                       
                      </tr>
                      <tr>
                        <td>6.</td>
                        <td>LHE</td>
                        <td>PELEPAS GAS
                          
                        </td>
                       
                      </tr>
                      <tr>
                        <td>7.</td>
                        <td>SON-T</td>
                        <td>PELEPAS GAS</td>
                       
                      </tr>
                      <tr>
                        <td>8.</td>
                        <td>LED</td>
                        <TD>PELEPAS GAS</TD>
                        
                      </tr>
                      <tr>
                        <td>9.</td>
                        <td>DOP</td>
                        <TD>PIJAR</TD>
                        
                      </tr>
                      <tr>
                        <td>10.</td>
                        <td>PIJAR</td>
                        <TD>PIJAR</TD>
                        
                      </tr>
                    </table>
               
                    </section>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                  <section class="content-header">
                      
                  <div class="box-header with-border">
                    <h3 class="box-title">KELAS LAMPU</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered">
                      <tr>
                        <th style="width: 10px">No</th>
                        
                        <th>Tipe</th>
                        <th>Daya (Watt)</th>
                        <th>Kelas</th>
                       
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>PIJAR</td>
                        <td>25-50</td>
                        <td>1</td>
                       
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>PIJAR</td>
                        <td>51-100</td>
                        <td>2</td>
                       
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>PIJAR</td>
                        <td>101-200</td>
                        <td>3</td>
                       
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>PIJAR</td>
                        <td>201-300</td>
                        <td>4</td>
                       
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>PIJAR</td>
                        <td>301-400</td>
                        <td>5</td>
                       
                      </tr>
                      <tr>
                        <td>6.</td>
                        <td>PIJAR</td>
                        <td>401-500</td>
                        <td>6</td>
                       
                      </tr>
                      <tr>
                        <td>7.</td>
                        <td>PIJAR</td>
                        <td>501-600</td>
                        <td>7</td>
                       
                      </tr>
                      <tr>
                        <td>8.</td>
                        <td>PIJAR</td>
                        <td>601-700</td>
                        <td>8</td>
                       
                      </tr>
                      <tr>
                        <td>9.</td>
                        <td>PIJAR</td>
                        <td>701-800</td>
                        <td>9</td>
                       
                      </tr>
                      <tr>
                        <td>10.</td>
                        <td>PIJAR</td>
                        <td>801-900</td>
                        <td>10</td>
                       
                      </tr>
                      <tr>
                        <td>11.</td>
                        <td>PIJAR</td>
                        <td>901-1000</td>
                        <td>11</td>
                       
                      </tr>
                      <tr>
                        <td>12.</td>
                        <td>PELEPAS GAS</td>
                        <td>10-50</td>
                        <td>12</td>
                       
                      </tr>

                      <tr>
                        <td>13.</td>
                        <td>PELEPAS GAS</td>
                        <td>51-100</td>
                        <td>13</td>
                       
                      </tr>
                      <tr>
                        <td>14.</td>
                        <td>PELEPAS GAS</td>
                        <td>101-250</td>
                        <td>14</td>
                       
                      </tr>
                      <tr>
                        <td>15.</td>
                        <td>PELEPAS GAS</td>
                        <td>251-500</td>
                        <td>15</td>
                       
                      </tr>
                      <tr>
                        <td>16.</td>
                        <td>PELEPAS GAS</td>
                        <td>501-1000</td>
                        <td>16</td>
                       
                      </tr>
                      
                     
                     
                    </table>
               
                    </section> 
                      
                  
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                   <section class="content-header">
                   <H4>Tarif Adjustment untuk Penerangan Jalan Umum termasuk ke dalam Golongan Tarif P-3/TR dapat dilihat pada <a href="http://www.pln.co.id/blog/tarif-tenaga-listrik/">link berikut</a>
                   </H4>
                   </section>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->

@endsection