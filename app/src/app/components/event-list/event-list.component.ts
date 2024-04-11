// src/app/components/event-list/event-list.component.ts

import { Component, OnInit } from '@angular/core';
import { Event } from '../../models/event.model';
import { EventService } from 'src/app/services/event.service';
import { Router } from '@angular/router';

@Component({
    selector: 'app-event-list',
    templateUrl: './event-list.component.html',
    styleUrls: ['./event-list.component.scss']
})
export class EventListComponent implements OnInit {
    events: Event[] = [
        {   
            id: 1,
            deviceId: "A23",
            eventDate: 1710355477,
            type: "deviceMulfunction",
            evtData: {
                reasonCode: 12,
                reasonText: "temp sensor not responding"
            }
        },
        {
            id: 2,
            deviceId: "A23",
            eventDate: 1710354477,
            type: "deviceMulfunction",
            evtData: {
                reasonCode: 11,
                reasonText: "no power"

            }
        },
        {
            id: 3,
            deviceId: "F12HJ",
            eventDate: 1710353477,
            type: "temperatureExceeded",
            evtData: {
                temp: 10.3,
                threshold: 8.5
            }
        },
        {
            id: 4,
            deviceId: "D12-1-12",
            eventDate: 1710352477,
            type: "doorUnlocked",
            evtData: {
                unlockDate: 1710350477
            }
        }
    ];

    constructor(
        private eventService: EventService,
        private router: Router,
    ) { }

    ngOnInit(): void {
        this.getEvents();
    }

    getEvents(): void {
        // Tutaj pobierane są zdarzenia z backendu
        this.eventService.getEvents().subscribe(events => {
            //this.events = events;
        });
    }

    openDetails(event: Event): void {
        // Przejście do strony szczegółów zdarzenia z dynamicznym ID
        this.router.navigate(['/events', event.id]); 
    }
}



