@extends('layouts.admin')
@section("css")

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/cryptocoins/cryptocoins.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/chartist.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
@endsection
@section("js") 
  <script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/jquery.sparkline.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/cards/card-statistics.js') }}" type="text/javascript"></script>

  <script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/timeline/horizontal-timeline.js') }}" type="text/javascript"></script>
@endsection

@section('content')
<div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"> 
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">{{ $count_users }}</h3>
                      <h6>Users</h6>
                    </div>
                    <div>
                      <i class="icon-user info font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">{{ $count_products }}</h3>
                      <h6>Products</h6>
                    </div>
                    <div>
                      <i class="ft-codepen warning font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success">{{ $count_reviews }}</h3>
                      <h6>Customer Reviews</h6>
                    </div>
                    <div>
                      <i class="icon-heart success font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_order_products }}</h3>
                      <h6>Products Ordered</h6>
                    </div>
                    <div>
                      <i class="ft-align-justify success font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_orders }}</h3>
                      <h6>Orders</h6>
                    </div>
                    <div>
                      <i class="ft-shopping-cart danger font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_pending }}</h3>
                      <h6>Orderes Pending</h6>
                    </div>
                    <div>
                      <i class="ft-more-horizontal warning font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_approved }}</h3>
                      <h6>Orderes Approved</h6>
                    </div>
                    <div>
                      <i class="ft-shopping-cart info font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{ $count_rejected }}</h3>
                      <h6>Orders Rejected</h6>
                    </div>
                    <div>
                      <i class="ft-slash primary font-large-2 float-right"></i>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>  
         
        <div class="row">
          <div class="col-xl-6 col-lg-12">
            <div class="card" style="">
              <div class="card-header">
                <h4 class="card-title">Products</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div id="new-orders" class="media-list position-relative ps-container ps-theme-default" data-ps-id="3fd0648e-8e87-02a5-d837-13e7fe5665d4">
                  <div class="table-responsive">
                    <table id="new-orders-table" class="table table-hover table-xl mb-0">
                      <thead>
                        <tr>
                          <th>Sl No</th>
                          <th class="border-top-0">Product</th>
                          <th class="border-top-0">Count</th> 
                        </tr>
                      </thead>
                      <tbody> 
                          @foreach($products_count as $key=>$prd)
                            <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $prd->name }}</td>
                              <td>{{ $prd->quantity }}</td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
        
          <div class="col-md-6 col-sm-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recent Buyers</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div id="recent-buyers" class="media-list">
                    @foreach($order as $odr)
                      <a href="#" class="media border-0">  
                        <div class="media-body w-100">
                          <h6 class="list-group-item-heading"> {{ $odr->name }}
                            <span class="font-medium-4 float-right pt-1">₹ {{ $odr->total }}</span>
                          </h6>
                          <p class="list-group-item-text mb-0">
                            @foreach($orderProducts as $prd)
                              @if($prd->id == $odr->id)
                              <span class="badge badge-primary">{{ $prd->name }}</span> 
                              @endif
                            @endforeach
                          </p>
                        </div>
                      </a>
                    @endforeach
                     
                  </div>
                </div>
              </div>
            </div>
        
        
        </div>

        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                <div class="card-body text-center">
                  <div class="card-header mb-2">
                    <span class="success">New Reviews this Month</span>
                    <h3 class="display-4 blue-grey darken-1">{{ $month['reviews']}}</h3>
                  </div>
                  @if($month['reviews'] != 0)
                  <div class="card-content">
                    <div style="display:inline;width:150px;height:150px;"><input type="text" value="{{ $month['reviews'] / $count_reviews * 100 }}" class="knob hide-value responsive angle-offset" data-angleoffset="40" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#28D094" data-knob-icon="icon-note" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: bold 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -114px; display: none;"><i class="knob-center-icon icon-note" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -114px;font-size: 50px;"></i></div>
                  </div>
                  @endif
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                <div class="card-body text-center">
                  <div class="card-header mb-2">
                    <span class="warning darken-2">New Users this Month</span>
                    <h3 class="display-4 blue-grey darken-1">{{ $month['users'] }}</h3>
                  </div>
                  @if($month['users'] != 0)
                  <div class="card-content">
                    <div style="display:inline;width:150px;height:150px;"><input type="text" value="{{ $month['users'] / $count_users * 100 }}" class="knob hide-value responsive angle-offset" data-angleoffset="0" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#FF9149" data-knob-icon="icon-user" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: bold 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -114px; display: none;"><i class="knob-center-icon icon-user" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -114px;font-size: 50px;"></i></div>
                  </div>
                  @endif
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 border-right-blue-grey border-right-lighten-5">
                <div class="card-body text-center">
                  <div class="card-header mb-2">
                    <span class="danger">Orders This month</span>
                    <h3 class="display-4 blue-grey darken-1">{{ $month['orders'] }}</h3>
                  </div>
                  @if($month['orders'] != 0)
                  <div class="card-content">
                    <div style="display:inline;width:150px;height:150px;"><input type="text" value="{{ $month['orders'] / $count_orders * 100 }}" class="knob hide-value responsive angle-offset" data-angleoffset="20" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputcolor="#e1e1e1" data-readonly="true" data-fgcolor="#FF4961" data-knob-icon="icon-users" readonly="readonly" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: bold 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -114px; display: none;"><i class="knob-center-icon icon-users" style="width: 79px; height: 50px; position: absolute; vertical-align: middle; margin-top: 50px; border: 0px; background: none; font: normal 30px Arial; text-align: center; color: rgb(225, 225, 225); padding: 0px; -webkit-appearance: none; margin-left: -114px;font-size: 50px;"></i></div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
