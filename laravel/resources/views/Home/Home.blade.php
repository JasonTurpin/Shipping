<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TBK Shipping Demo</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">

      <div class="row hoffa" id="errorContainer">
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <ul id="errorMessages"></ul>
        </div>
      </div>

      <div class="row">

        <div class="col-md-6">

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Sales Channel</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <select class="form-control input-lg" name="CartName" disabled>
                      <option value="default">-- Select A Channel--</option>
                      <option value="Brighter Blooms">Brighter Blooms</option>
                      <option value="Fast Growing Trees">Fast Growing Trees</option>
                      <option value="Third Cart">Third Cart</option>
                  </select>
                </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Recipient Details</h3>
              <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary">Edit</button>
              </div>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="ShipName" placeholder="Full Name" disabled>
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="ShipAddress" placeholder="Address 1" disabled>
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="ShipAddress2" placeholder="Address 2" disabled>
              </div>
              <div class="row form-group">
                <div class="col-xs-6">
                  <input type="text" class="form-control input-lg" name="ShipCity" placeholder="City" disabled>
                </div>
                <div class="col-xs-3">
                  <select class="form-control input-lg" id="state" name="ShipState" disabled>
                      <option value="default">State</option>
                    	<option value="AL">AL</option>
                    	<option value="AK">AK</option>
                    	<option value="AZ">AZ</option>
                    	<option value="AR">AR</option>
                    	<option value="CA">CA</option>
                    	<option value="CO">CO</option>
                    	<option value="CT">CT</option>
                    	<option value="DE">DE</option>
                    	<option value="DC">DC</option>
                    	<option value="FL">FL</option>
                    	<option value="GA">GA</option>
                    	<option value="HI">HI</option>
                    	<option value="ID">ID</option>
                    	<option value="IL">IL</option>
                    	<option value="IN">IN</option>
                    	<option value="IA">IA</option>
                    	<option value="KS">KS</option>
                    	<option value="KY">KY</option>
                    	<option value="LA">LA</option>
                    	<option value="ME">ME</option>
                    	<option value="MD">MD</option>
                    	<option value="MA">MA</option>
                    	<option value="MI">MI</option>
                    	<option value="MN">MN</option>
                    	<option value="MS">MS</option>
                    	<option value="MO">MO</option>
                    	<option value="MT">MT</option>
                    	<option value="NE">NE</option>
                    	<option value="NV">NV</option>
                    	<option value="NH">NH</option>
                    	<option value="NJ">NJ</option>
                    	<option value="NM">NM</option>
                    	<option value="NY">NY</option>
                    	<option value="NC">NC</option>
                    	<option value="ND">ND</option>
                    	<option value="OH">OH</option>
                    	<option value="OK">OK</option>
                    	<option value="OR">OR</option>
                    	<option value="PA">PA</option>
                    	<option value="RI">RI</option>
                    	<option value="SC">SC</option>
                    	<option value="SD">SD</option>
                    	<option value="TN">TN</option>
                    	<option value="TX">TX</option>
                    	<option value="UT">UT</option>
                    	<option value="VT">VT</option>
                    	<option value="VA">VA</option>
                    	<option value="WA">WA</option>
                    	<option value="WV">WV</option>
                    	<option value="WI">WI</option>
                    	<option value="WY">WY</option>
                  </select>
                </div>
                <div class="col-xs-3">
                  <input type="text" class="form-control input-lg" name="ShipZip" placeholder="Zip Code" disabled>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" name="phone" placeholder="Phone" disabled>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-6">

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Lookup Order</h3>
            </div>
            <div class="panel-body">
              <div class="input-group input-group-lg">
                <input type="text" class="form-control input-lg" placeholder="Scan Order Number" name="scanOrderNumber" />
                <span class="input-group-btn">
                  <button class="btn btn-success btn-lg" data-loading-text="Searching...">Lookup</button>
                </span>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Package Details</h3>
            </div>
            <div class="panel-body">
              <div class="form-group input-group input-group-lg">
                <input type="text" class="form-control input-lg" placeholder="Box">
                <span class="input-group-btn">
                  <button class="btn btn-success btn-lg">Lookup</button>
                </span>
              </div>
              <div class="row form-group">
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="Length" disabled>
                </div>
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="Width" disabled>
                </div>
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="Height" disabled>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Weight (lbs)">
              </div>
              <div class="row form-group">
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="Picker">
                </div>
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="Packer">
                </div>
                <div class="col-xs-4">
                  <input type="text" class="form-control input-lg" placeholder="Num. of Trees">
                </div>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Shipping Details</h3>
              <div class="btn-group pull-right">
                <button type="button" class="btn btn-warning" disabled><span class="glyphicon glyphicon-download-alt"></span> Refresh Rates</button>
                <button type="button" class="btn btn-primary" disabled>Edit</button>
              </div>
            </div>
            <div class="panel-body">
              <div class="btn-group btn-block">
                <button class="btn btn-default btn-lg btn-block dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                  Recipient and Package Details Required  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <!--
                  List items of available shipping methods...
                  <li><a href="#">FedEx - Home Delivery</a></li>
                  //-->
                </ul>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="row">
        <div class="col-md-2">
          <button type="button" class="btn btn-warning btn-lg btn-block" id="resetForm"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Reset Form</button>
        </div>

        <div class="col-md-6 col-md-offset-4">
          <button type="button" class="btn btn-success btn-lg btn-block" disabled>Print Shipping Label</button>
        </div>
      </div>

    </div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>
