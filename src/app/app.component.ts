import { Component, AfterViewInit  } from '@angular/core';

import 'bootstrap';
import * as $ from 'jquery';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements AfterViewInit {
  title = 'omniavincit-web-site';

  ngAfterViewInit() {
      ($('[data-toggle="tooltip"]') as any).tooltip();
      ($('[data-toggle="popover"]')as any).popover()
    }
}
