// src/app/models/event.model.ts

export interface EvtData {
    reasonCode?: number;
    reasonText?: string;
    temp?: number;
    threshold?: number;
    unlockDate?: number;
  }
  
  export interface Event {
    id: number;
    deviceId: string;
    eventDate: number;
    type: string;
    evtData: EvtData;
  }
  