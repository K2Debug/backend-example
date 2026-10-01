import os
import logging
from datetime import datetime
from fastapi import FastAPI
from fastapi.responses import HTMLResponse
from pydantic import BaseModel

# Render captures stdout/stderr and shows it in the dashboard Logs tab.
logging.basicConfig(level=logging.INFO)
logger = logging.getLogger("demo")

app = FastAPI()

# NOTE: logs live only in memory, so they reset when Render restarts/redeploys.
logs: list[dict] = []

def add_log(text: str):
    entry = {"time": datetime.now().isoformat(timespec="seconds"), "text": text}
    logs.append(entry)  # in-memory store
    logger.info(text)   # console output -> visible in Render Logs tab
    return entry

class Message(BaseModel):
    message: str

HTML_PAGE = """<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Render Demo</title>
<style>body{font-family:sans-serif;max-width:600px;margin:2rem auto;padding:0 1rem}
#logs{background:#111;color:#0f0;padding:1rem;height:200px;overflow-y:auto;font-family:monospace}</style>
</head><body>
<h1>Render Backend Demo</h1>
<input id="msg" placeholder="Type a message" />
<button onclick="send()">Send</button>
<p id="resp"></p>
<h2>Server Logs</h2>
<div id="logs"></div>
<script>
async function send(){
  const message=document.getElementById('msg').value;
  const r=await fetch('/send',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({message})});
  const data=await r.json();
  document.getElementById('resp').textContent=JSON.stringify(data);
}
async function poll(){
  const r=await fetch('/logs'); const data=await r.json();
  const box=document.getElementById('logs');
  box.innerHTML=data.map(e=>`[${e.time}] ${e.text}`).join('<br>');
  box.scrollTop=box.scrollHeight; // newest at bottom
}
setInterval(poll,2000); poll();
</script></body></html>"""

@app.get("/", response_class=HTMLResponse)
def home():
    return HTML_PAGE

@app.post("/send")
def send(msg: Message):
    add_log("Request received")
    add_log(f"Message logged: {msg.message}")
    entry = add_log("Response sent")
    return {"status": "received", "message": msg.message, "time": entry["time"]}

@app.get("/logs")
def get_logs():
    return logs

# Render runs this start command: uvicorn main:app --host 0.0.0.0 --port $PORT
if __name__ == "__main__":
    import uvicorn
    port = int(os.getenv("PORT", "8000"))  # Render sets PORT for us
    uvicorn.run("main:app", host="0.0.0.0", port=port)
