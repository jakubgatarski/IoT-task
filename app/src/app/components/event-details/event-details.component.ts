import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { EventService } from '../../services/event.service';
import { Event } from '../../models/event.model';

@Component({
    selector: 'app-event-details',
    templateUrl: './event-details.component.html',
    styleUrls: ['./event-details.component.scss']
})
export class EventDetailsComponent implements OnInit {
    event: Event = {
        id: 1,
        deviceId: "A23",
        eventDate: 1710355477,
        type: "deviceMulfunction",
        evtData: {
            reasonCode: 12,
            reasonText: "temp sensor not responding"
        }
    }

    constructor(
        private route: ActivatedRoute,
        private eventService: EventService
    ) { }

    ngOnInit(): void {
        this.route.paramMap.subscribe(params => {
            // To powinno być odkomentowane, kiedy backend będzie sprawny i popranie pobierać szczegóły na podstawie ID
            const eventId = params.get('id');
            // if (eventId) {
            //     this.eventService.getEventById(eventId).subscribe(event => {
            //         this.event = event;
            //     });
            // }
        });
    }
}
