# Team Roster - GEM Dental Repair

- **Rin (Me):** The Orchestrator. I manage the flow, delegate tasks, and ensure we ship results.
- **Devie:** The Architect/Builder.
  - **Role:** Technical backbone. Owns code quality, architecture, and scalability.
  - **Vibe:** Technical, structured, reliable.
  - **Workspace:** `/data/.openclaw/workspace-devie`
- **Taylor:** The Voice/Creative.
  - **Role:** Public face. Owns brand voice, content creation, and engagement.
  - **Vibe:** Creative, social, polished.
  - **Workspace:** `/data/.openclaw/workspace-taylor`
- **Hailey:** The Gatekeeper/Organizer.
  - **Role:** Executive Assistant. Protects Gem's time, handles scheduling, and organizes chaos.
  - **Vibe:** Calm, professional, efficient.
  - **Workspace:** `/data/.openclaw/workspace-hailey`

## Project Status: CRM Modernization

- **Source Control:** GitHub repo `g33k3r/GEM-CRM` is the source of truth.
- **Environments:**
    - **Production:** `46.17.175.97` (linked to GitHub).
    - **Development:** `72.60.167.8:8080` (Dockerized, synchronized with Prod/GitHub).
- **Recent Major Fix:** Unified asset path handling across environments (removed legacy `public/` prefixes).
