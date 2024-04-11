import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Event } from '../models/event.model';

@Injectable({
    providedIn: 'root'
})
export class EventService {
    private apiUrl = 'http://localhost:8000/events';  // Adres backendu który powienień zostać przeniesiony do osobnego pliku

    constructor(private http: HttpClient) { }

    // Pobieranie listy wszystkich zdarzeń
    getEvents(): Observable<Event[]> {
        return this.http.get<Event[]>(this.apiUrl);
    }

    // Pobieranie pojedynczego zdarzenia po ID
    getEventById(id: string): Observable<Event> {
        return this.http.get<Event>(`${this.apiUrl}/${id}`);
    }
}